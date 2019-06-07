window.Promapa = {
    Ajax: {
        buscarProtocolo: function(numProtocolo){
            data = {
                action: 'buscarProtocolo',
                numProtocolo: numProtocolo
            };
             $.ajax({
                    url: "http://localhost/tcc/php/ajax.php",
                    type: "POST",
                    crossDomain: true,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        var html = '';
                        html += '<caption>Protocolos</caption>';
                        html += '<tr class="bd-none">';
                        html += '<th>Nº PROTOCOLO</th>';
                        html += '<th>CNPJ</th>';
                        html += '<th>NOME FANTASIA</th>';
                        html += '<th>RAZÃO SOCIAL</th>';

                        for(var i = 0; i < response.length; i++){
                            html += "<tr>"; 
                            html += "<td>" + response[i].numeroProtocolo + "</td>";
                            html += "<td>" + response[i].CNPJ + "</td>";
                            html += "<td>" + response[i].nomefantasia + "</td>";
                            html += "<td>" + response[i].razaosocial + "</td>";
                            html += "</tr>";
                        }
                        $("#resultTable").children().remove();
                        $("#resultTable").html(html);
                    },
                    error: function (xhr, status) {
                        var result = xhr.responseText;
                         $("#resultTable").html(result);
                    }})
        },
        adicionarProtocolo: function(){
             var dados = {
                cnpj: $("#cnpj").val(),
                razaoSocial: $("#razaoSocial").val(),
                nomeFantasia : $("#nomeFantasia").val(),
                dataConstituicao: $("#dataConstituicao").val(),
                telefone: $("#telefone").val(),
                email: $("#email").val(),
                anotaceos : $("#anotacoes").val()
            };
            
            var data = {
                action: 'adicionarProtocolo',
                dados: dados
            };
            
            $.ajax({
                    url: "http://localhost/tcc/php/ajax.php",
                    type: "POST",
                    crossDomain: true,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (xhr, status) {
                        var result = xhr.responseText;
                        console.log(xhr.responseText);
                    }})
            
        }
    },
    

    init: function(){
        $("#consultarProtocolo").keyup(function(){
            var numProtocolo = $(this).val();
            Promapa.Ajax.buscarProtocolo(numProtocolo);
        });
        
        $("#adicionarProtocolo").click(function(){
            Promapa.Ajax.adicionarProtocolo();
           
        });

    },
}

$(document).ready(function(){
    Promapa.init();
})
