<?php
require __DIR__ . '/vendor/autoload.php';


const token = 'H0JvsJX1Tqfd1A4-KH4Da-CdA2W6QJw6KfxlObjYOmr-91pD9wi0_DLiaT0Yu7lciRX28cjFe6mCv-VSwZiDqA==';
const org = 'ITMO University';
const bucket = 'web_lab1';


class InfluxDAO {
    private $client;

    function __construct() {        
        $this->$client = new InfluxDB2\Client([
            "url" => "http://localhost:8086",
            "token" => token,
            "bucket" => bucket,
            "org" => org,
            "precision" => InfluxDB2\Model\WritePrecision::NS,
        ]);
    }
    
    function writeHit($hit, $uid) {
        $writeApi = $this->$client->createWriteApi();

        $point = InfluxDB2\Point::measurement('hit')->addTag('uid', strval($uid));

        foreach($hit as $key=>$value) {
            $point->addField($key, $value);
        }

        $point->time(microtime(true));

        $writeApi->write($point, InfluxDB2\Model\WritePrecision::S, bucket, org);
    }

    function getResults($uid) {
        $res = array();

        $queryApi = $this->$client->createQueryApi();
        
        $tables = $queryApi->query(
            'from(bucket: "web_lab1")
            |> range(start: -1h)
            |> filter(fn: (r) => r["_measurement"] == "hit")
            |> filter(fn: (r) => r["uid"] == "'.$uid.'")
            |> group(columns: ["uid", "_field"])'
        );

        foreach($tables as $table) {
            foreach($table->records as $record) {
                $time = strtotime($record->getTime());
                
                if(!array_key_exists($time, $res)) {
                    $res[$time] = array();
                }

                $res[$time][$record->getField()] = $record->getValue();
            }
        }

        return $res;
    }
}
?>