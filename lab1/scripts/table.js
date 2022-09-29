function update(table_block, rows_input) {
    fetch("/php/readHit.php", {
        method: "GET",
        headers: {
            "Content-Type" : "text/html"
        }
    }).then(
        (response) => {
            return response.text();
        }
    ).then(
        (data) => {
            html = data
            const size = (data.match(/<tr>/g) || []).length - 1
            const expected = Number(rows_input.getAttribute("value"))
            
            for(let i = size; i < expected; i++) {
                html += "<tr class=\"loading\">"
                for(let k = 0; k < 6; k++) {
                    html += "<td></td>"
                }
                html += "</tr>"
            }

            if(size > expected) {
                rows_input.setAttribute("value", size);
            }

            table_block.innerHTML = html
        }
    ).catch(
        (error) => {
            table_block.innerHTML = "<h1>" + error + "</h1>"

            console.log(error)
        }
    )
}

const table_block = document.getElementsByClassName("table-block")[0]
const rows_input = document.getElementById("rows_input");

setInterval(() => {
    update(table_block, rows_input);
}, 5000)