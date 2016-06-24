function getIp()
{
    $.get('http://ocodigo.com/p/00001/scanner/getip', function(data){
        alert(data);
    });
}

function getPorts()
{
    var group = $('#selectGroup').val();
    if(group === '')
    {
        $('#result').html('');
        alert('É necessário selecionar um grupo!');
    }
    else
    {
        $('.checkbox').remove();
        $('input[type="checkbox"]').prop('checked', false);        
        $.post('http://ocodigo.com/p/00001/scanner/getportsgroup', {'group': group}, function(data){
        	$('#result').html('');
            $('#result').html(data);
        });
    }
}

function getVerification(ip)
{
    var ip = ip;
    var rows = $('#result tr').length;
    var ports = [];

    for(var i = 1; i < rows+1; i++)
    {
        var row = $('#result tr:nth-child('+i+') .checkbox');
        if(row.prop('checked'))
        {
            ports.push(row.attr('port-number'));
        }
    }

    if(ports.length < 1)
    {
        alert("É necessário selecionar a(s) porta(s) que desejar aplicar o teste!");
    }
    else
    {
        for(var j = 0; j < ports.length; j++)
        {

            var item = $('#status'+ports[j]);
            var loader = $('#status'+ports[j]+' img');
            //item.html('<font color="#ffa500">Verificando</font>');
            item.html('<img src="http://ocodigo.com/p/00001/uploads/icons/loader.gif" >');
            item.load('http://ocodigo.com/p/00001/scanner/getportverification', {'ip':ip, 'port':ports[j]}, function(response, status, xhr){
                if(status === "success")
                {
                    item.html(response).fadeIn();
                    loader.fadeOut();
                }
                if(status === "error")
                {   
                    loader.fadeOut();                 
                    item.html(xhr).fadeIn();
                }
            });       
        }

    }    
}

function checkboxOn(e)
{
    var reg = $('.checkbox').length;
    var opt = $(e).prop('checked');

    if(reg < 1)
    {
        $('input[type="checkbox"]').prop('checked', false);
        alert("Por favor, selecione um grupo de portas!");
    }
    else if(opt === true)
    {
        $('.checkbox').prop('checked', true);
    }
    else
    {
        $('.checkbox').prop('checked', false);
    }

}

