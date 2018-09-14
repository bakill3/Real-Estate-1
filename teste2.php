<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
        <table id="dynamic-table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>nome</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        
    
    <button id="add">Adicionar</button>
    <script>
        /* FUNÇÂO ADICIONAR ROW/ ELEMENTOS HTML */
        var addNewRow = function(e) {
            /* IDENTIFICAR A tabela */
            var tableBody = document.getElementById("dynamic-table").children[1]
            /* CRIAR ELEMENTO TR EM VAR */
            var tr = document.createElement("tr")
            /* CRIAR ELEMENTO TD EM VAR */
            var tdChave = document.createElement("td")
            /* CRIAR ELEMENTO TD EM VAR */
            var tdCheck = document.createElement("td")
            /* CRIAR ELEMENTO INPUT EM VAR */
            var chaveInput = document.createElement("input")
            /* CRIAR ELEMENTO INPUT EM VAR */
            var checkInput = document.createElement("input")
            /* ATRIBUIR ATRIBUTOS AOS ELEMENTOS CRIADOS */
            chaveInput.setAttribute('name', 'feact_text[]')

            chaveInput.setAttribute('type', 'text')

            checkInput.setAttribute('name', 'feact_check[]')

            checkInput.setAttribute('type', 'checkbox')    

            /* APPEND/JUNTAR */        

            tdChave.appendChild(chaveInput)

            tdCheck.appendChild(checkInput)
            
            tr.appendChild(tdChave)

            tr.appendChild(tdCheck)

            tableBody.appendChild(tr)
        }

        document.getElementById("add").addEventListener('click', addNewRow);
    </script>
</body>
</html>