window.Promapa = {
    Ajax: {
        buscarProtocolo: function(numProtocolo, usuarioId){
            data = {
                action: 'buscarProtocolo',
                numProtocolo: numProtocolo,
                usuarioId: usuarioId
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
        adicionarProtocolo: function(dados, usuarioId){
            var data = {
                action: 'adicionarProtocolo',
                dados: dados,
                usuarioId: usuarioId
            };
            
            $.ajax({
                    url: "http://localhost/tcc/php/ajax.php",
                    type: "POST",
                    crossDomain: true,
                    data: data,
                    dataType: "json",
                    success: function (response) {
                        if(response == 1){
                            window.alert('Protocolo inserido com sucesso!');
                        }
                        else if(response != 1){
                            window.alert('Ocorreu um erro, verifique os dados e tente novamente');
                        }
                    /*     var html = "<p>" + response + "</p>";
                        $("#result").html(html); */
                    },
                    error: function (xhr, status) {
                        var html = "<p>" + xhr.responseText + "</p>";
                        $("#result").html(html);
                    }})
            
        },
        autenticarUsuario: function(dados){
             var data = {
                action: 'autenticarUsuario',
                dados: dados
            };

            $.ajax({
                url: "http://localhost/tcc/php/ajax.php",
                type: "POST",
                crossDomain: true,
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response != null){
                        sessionStorage.setItem('login', response.login);
                        sessionStorage.setItem('codigo', response.codigo);
                        sessionStorage.setItem('id', response.id);
                        window.location = 'home.php';
                    }
                },
                error: function (xhr, status) {
                    var html = "<p>" + xhr.responseText + "</p>";
                    $("#result").html(html);
                }})
        },
        deslogarUsuario: function(){
            var data = {
                action: 'deslogarUsuario'
            };

            $.ajax({
                url: "http://localhost/tcc/php/ajax.php",
                type: "POST",
                crossDomain: true,
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response == 1){
                        sessionStorage.clear();
                        window.location = 'login.php';
                    }
                },
                error: function (xhr, status) {
                    var html = "<p>" + xhr.responseText + "</p>";
                    $("#result").html(html);
                }})
        }
    },
    init: function(){
        $("#consultarProtocolo").keyup(function(){
            var numProtocolo = $(this).val();
            var usuarioId = sessionStorage.getItem("id");
            Promapa.Ajax.buscarProtocolo(numProtocolo, usuarioId);
        });
        
        $("#adicionarProtocolo").click(function(event){
            event.preventDefault();
            var usuarioId =sessionStorage.getItem("id");

            var cnpj = $("#cnpj").val();
            cnpj = cnpj.replace(/\./g,'').replace('/', '').replace('-', '').trim();

            var dataConstituicao =  $("#dataConstituicao").val().split('/');
            dataConstituicao = dataConstituicao[2] + "-" + dataConstituicao[1] +  "-" + dataConstituicao[0];

            var telefone = $("#telefone").val();
            telefone = telefone.replace('-', '').replace('(','').replace(')','').trim();

            var dados = {
                cnpj: cnpj,
                razaoSocial: $("#razaoSocial").val(),
                nomeFantasia : $("#nomeFantasia").val(),
                dataConstituicao: dataConstituicao,
                telefone: telefone,
                email: $("#email").val(),
                anotacao : $("#anotacoes").val()
            };

            Promapa.Ajax.adicionarProtocolo(dados, usuarioId);
           
        });

        $("#btnLogin").click(function(event){
            event.preventDefault();
            var dados = {
                login: $("#login").val(),
                senha: $("#senha").val()
            };

            Promapa.Ajax.autenticarUsuario(dados);
        });

        $("#logoff").click(function(){
            Promapa.Ajax.deslogarUsuario();
        });

    },
}

$(document).ready(function(){
    Promapa.init();
})
