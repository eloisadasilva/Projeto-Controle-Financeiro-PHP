function ValidarMeusDados() {
    var nome = document.getElementById("nome").value; //criação de variável em javascript, pegando o valor digitado no Id correspondente
    var email = $("#email").val(); // mesma função de cima, mas de forma resumida, em JQuery - símbolo # é para determinar Id
    var msg = "";

    if (nome.trim() == '') {
        //alert("Preencher campo NOME."); //alert tem a mesma função do echo no php
        //$("#nome").focus(); //focus é função nativa do javascript para que o cursor volte para o local que o Id foi digitado
        $("#divNome").addClass("has-error");
        msg = "Preencher o campo NOME.\n";
    } else {
        $("#divNome").removeClass("has-error").addClass("has-success");
    }

    if (email.trim() == '') {
        $("#divEmail").addClass("has-error");
        msg += "Preencher o campo E-MAIL.";
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
    }

    if ($("#nome").val().trim() == '') {
        $("#nome").focus();
    } else if ($("#email").val().trim() == '') {
        $("#email").focus();
    }

    if (msg != "") {
        alert(msg)
        return false;
    }
}

function ValidarCategoria() {

    if ($("#nomecategoria").val().trim() == '') {
        alert("Preencher o campo NOME DA CATEGORIA.");
        $("#divCategoria").addClass("has-error");
        $("#nomecategoria").focus();
        return false;
    } else {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
    }

}


function ValidarConta() {

    var msg = "";
    if ($("#nomebanco").val().trim() == '') {
        $("#divConta").addClass("has-error");
        msg = "Preencher o campo NOME DO BANCO.\n";
    } else {
        $("#divConta").removeClass("has-error").addClass("has-success");

    }

    if ($("#agencia").val().trim() == '') {
        $("#divContaAgencia").addClass("has-error");
        msg += "Preencher o campo AGÊNCIA.\n";
    } else {
        $("#divContaAgencia").removeClass("has-error").addClass("has-success");

    }

    if ($("#numconta").val().trim() == '') {
        $("#divContaNumconta").addClass("has-error");
        msg += "Preencher o campo NÚMERO DA CONTA.\n";
    } else {
        $("#divContaNumconta").removeClass("has-error").addClass("has-success");

    }

    if ($("#saldo").val().trim() == '') {
        $("#divContaSaldo").addClass("has-error");
        msg += "Preencher o campo SALDO.";
    } else {
        $("#divContaSaldo").removeClass("has-error").addClass("has-success");

    }

    if ($("#nomebanco").val().trim() == '') {
        $("#nomebanco").focus();
    } else if ($("#agencia").val().trim() == '') {
        $("#agencia").focus();
    } else if ($("#numconta").val().trim() == '') {
        $("#numconta").focus();
    } else if ($("#saldo").val().trim() == '') {
        $("#saldo").focus();
    }


    if (msg != "") {
        alert(msg)
        return false;
    }
}

function ValidarEmpresa() {

    if ($("#nomeempresa").val().trim() == '') {
        alert("Preencher o campo EMPRESA.");
        $("#divEmpresa").addClass("has-error");
        $("#nomeempresa").focus();
        return false;
    } else {
        $("#divEmpresa").removeClass("has-error").addClass("has-success");
    }

}

function ValidarMovimento() {

    var msg = "";

    if ($("#tipomovimento").val() == '') {
        $("#divTipo").addClass("has-error");
        msg = "Preencher o campo TIPO DO MOVIMENTO.\n";
    } else {
        $("#divTipo").removeClass("has-error").addClass("has-success");
    }

    if ($("#data").val().trim() == '') {
        $("#divData").addClass("has-error");
        msg += "Preencher o campo DATA.\n";
    } else {
        $("#divData").removeClass("has-error").addClass("has-success");
    }

    if ($("#valor").val().trim() == '') {
        $("#divValor").addClass("has-error");
        msg += "Preencher o campo VALOR.\n";
    } else {
        $("#divValor").removeClass("has-error").addClass("has-success");
    }

    if ($("#categoria").val().trim() == '') {
        $("#divCategoria").addClass("has-error");
        msg += "Preencher o campo CATEGORIA.\n";
    } else {
        $("#divCategoria").removeClass("has-error").addClass("has-success");
    }

    if ($("#empresa").val().trim() == '') {
        $("#divEmpresa").addClass("has-error");
        msg += "Preencher o campo EMPRESA.\n";
    } else {
        $("#divEmpresa").removeClass("has-error").addClass("has-success");
    }

    if ($("#conta").val().trim() == '') {
        $("#divConta").addClass("has-error");
        msg += "Preencher o campo CONTA.";
    } else {
        $("#divConta").removeClass("has-error").addClass("has-success");
    }

    if ($("#tipomovimento").val().trim() == '') {
        $("#tipomovimento").focus();
    } else if ($("#data").val().trim() == '') {
        $("#data").focus();
    } else if ($("#valor").val().trim() == '') {
        $("#valor").focus();
    } else if ($("#categoria").val().trim() == '') {
        $("#categoria").focus();
    } else if ($("#empresa").val().trim() == '') {
        $("#empresa").focus();
    } else if ($("#conta").val().trim() == '') {
        $("#conta").focus();
    }

    if (msg != "") {
        alert(msg)
        return false;
    }
}


    function ValidarConsultaPeriodo() {

        var msg = "";

        if ($("#data_inicial").val().trim() == '') {
            $("#divDatainicial").addClass("has-error");
            msg = "Preencher o campo DATA INICIAL.\n"
        } else {
            $("#divDatainicial").removeClass("has-error").addClass("has-success");
        }

        if ($("#data_final").val().trim() == '') {
            $("#divDatafinal").addClass("has-error");
            msg += "Preencher o campo DATA FINAL.\n"
        } else {
            $("#divDatafinal").removeClass("has-error").addClass("has-success");
        }

        if (msg != "") {
            alert(msg)
            return false;
        }

    }

    function ValidarConsultaMovimentoEmpresa() {

        var msg = "";
        
        if ($("#empresa").val().trim() == '') {
            $("#divEmpresa").addClass("has-error");
            msg += "Preencher o campo EMPRESA.\n";
        } else {
            $("#divEmpresa").removeClass("has-error").addClass("has-success");
        }

        if ($("#data_inicial").val().trim() == '') {
            $("#divDatainicial").addClass("has-error");
            msg += "Preencher o campo DATA INICIAL.\n"
        } else {
            $("#divDatainicial").removeClass("has-error").addClass("has-success");
        }

        if ($("#data_final").val().trim() == '') {
            $("#divDatafinal").addClass("has-error");
            msg += "Preencher o campo DATA FINAL.\n"
        } else {
            $("#divDatafinal").removeClass("has-error").addClass("has-success");
        }

        if (msg != "") {
            alert(msg)
            return false;
        }

    }

function ValidarLogin() {

    var msg = "";

    if ($("#email").val().trim() == '') {
        $("#divEmail").addClass("has-error");
        msg += "Preencher o campo E-MAIL.\n"
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
    }

    if ($("#senha").val().trim() == '') {
        $("#divSenha").addClass("has-error");
        msg += "Preencher o campo SENHA."
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
    }


    if ($("#email").val().trim() == '') {
        $("#email").focus();
    } else if ($("#senha").val().trim() == '') {
        $("#senha").focus();
    }

    if (msg != "") {
        alert(msg)
        return false;
    }
}

function ValidarCadastro() {

    var msg = "";

    if ($("#nome").val().trim() == '') {
        $("#divNome").addClass("has-error");
        msg += "Preencher o campo NOME.\n"
    } else {
        $("#divNome").removeClass("has-error").addClass("has-success");
    }

    if ($("#email").val().trim() == '') {
        $("#divEmail").addClass("has-error");
        msg += "Preencher o campo E-MAIL.\n"
    } else {
        $("#divEmail").removeClass("has-error").addClass("has-success");
    }

    if ($("#senha").val().trim() == '') {
        $("#divSenha").addClass("has-error");
        msg += "Preencher o campo SENHA.\n"
    } else if ($("#senha").val().trim().length < 6) {
        $("#divSenha").addClass("has-error");
        msg += "A SENHA deve conter no mínimo 6 caracteres.\n"
    } else {
        $("#divSenha").removeClass("has-error").addClass("has-success");
    }

    if ($("#repsenha").val().trim() == '') {
        $("#divRepsenha").addClass("has-error");
        msg += "Preencher o campo REPETIR SENHA.\n";
    } else if ($("#repsenha").val().trim() != $("#senha").val()) {
        $("#divRepsenha").addClass("has-error");
        msg += "Campos SENHA e REPETIR SENHA devem ser iguais.";

    } else {
        $("#divRepsenha").removeClass("has-error").addClass("has-success");
    }


    if ($("#nome").val().trim() == '') {
        $("#nome").focus();
    } else if ($("#email").val().trim() == '') {
        $("#emaildata_final").focus();
    } else if ($("#senha").val().trim() == '') {
        $("#senha").focus();
    } else if ($("#senha").val().trim().length < 6){
        $("#senha").focus();
    } else if ($("#repsenha").val().trim() == '') {
        $("#repsenha").focus();
    } else if ($("#repsenha").val().trim() != $("#senha").val()) {
        $("#repsenha").focus();
    }

    if (msg != "") {
        alert(msg)
        return false;
    }


}

