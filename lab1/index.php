<?php 
    require_once __DIR__ . "\php\classes\AuthManager.php";
    $uid = (new AuthManager())->getUid();
?>
<!DOCTYPE html>
<html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href='css/layouts/default_layout.css'>
        <link rel="stylesheet" href='css/layouts/main_layout.css'>
        <link rel="stylesheet" href='css/typography.css'>
        <link rel="stylesheet" href='css/header.css'>
        <link rel="stylesheet" href='css/skeleton.css'>
        <link rel="stylesheet" href='css/content/content.css'>
        <link rel="stylesheet" href='css/content/radio-input.css'>
        <link rel="stylesheet" href='css/content/check-button.css'>
        <link rel="stylesheet" href='css/content/table.css'>

        

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">


        <title>Скрябин Иван P32092</title>
    </head>
    <body>
        <main>
            <div class="content-wrap">
                <div class="table-block">
                    <?php
                        require_once "php/hit.php";
                    ?>
                </div>

                <form class="form-wrap" id="main-form" method="post">
                    <input id="rows_input" type="hidden" name="rows" value=<?php echo $expected_size;?> /> 
                    <div id="info-block">
                        <h1 class="block-title">Скрябин Иван<br>P32092<br>Вариант 1816</h1>
                        <div id="plot-box">
                            <img src="media/plot.png" alt="plot" id="plot">
                        </div>
                    </div>
        
                    <div class="input-block radio-input-block" id="x-input-block">
                        <h1 class="block-title">X</h1>
    
                        <div class="buttons-holder">
    
                            <div class="radio-button">
                                <input id="radio--3" type="radio" name="x" value="-3">
                                <label for="radio--3">-3</label>
                            </div>
                                
                            <div class="radio-button">
                                <input id="radio--2" type="radio" name="x" value="-2" checked>
                                <label for="radio--2">-2</label>
                            </div>
    
                            <div class="radio-button">
                                <input id="radio--1" type="radio" name="x" value="-1">
                                <label for="radio--1">-1</label>
                            </div>
    
                            <div class="radio-button">
                                <input id="radio-0" type="radio" name="x" value="1">
                                <label for="radio-0">0</label>
                            </div>
    
                            <div class="radio-button">
                                <input id="radio-1" type="radio" name="x" value="1">
                                <label for="radio-1">1</label>
                            </div>
                                 
                            <div class="radio-button">
                                <input id="radio-2" type="radio" name="x" value="2">
                                <label for="radio-2">2</label>
                            </div>
                                 
                            <div class="radio-button">
                                <input id="radio-3" type="radio" name="x" value="3">
                                <label for="radio-3">3</label>
                            </div>
                             
                            <div class="radio-button">
                                <input id="radio-4" type="radio" name="x" value="4">
                                <label for="radio-4">4</label>
                            </div>
                
                            <div class="radio-button">
                                <input id="radio-5" type="radio" name="x" value="5">
                                <label for="radio-5">5</label>
                            </div>
                        </div>
                    </div>
    
                    <div class="input-block" id="r-input-block">
                        <h1 class="block-title">R</h1>
                        <select id="r-input" name="r" required>
                            <option value="1">1</option>
                            <option value="1.5">1.5</option>
                            <option value="2">2</option>
                            <option value="2.5">2.5</option>
                            <option value="3">3</option>
                        </select>
                    </div>
    
                    <div id="check-button-holder">
                        <button id="check-button" class="block-title">CHECK</button>
                    </div>
                    
                    <div class="input-block" id="y-input-block">
                        <h1 class="block-title">Y</h1>
                        <input id="y-input" name="y" type="text" maxlength="17" required>
                    </div>  
                </form>
                
            </div>
            
        </main>
        
        <script src="scripts/validate.js"></script>
        <script src="scripts/table.js"></script>
    </body>
</html>