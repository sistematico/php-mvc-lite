$(function() {
    $('#formmensagens').on('submit', function(e){
        e.preventDefault();
        if ($('#mensagem').val().length > 0) {
            $.post(url + "chat/add",{ mensagem: $("#mensagem").val() }, function(data) {
                if (data) {
                    $('#mensagem').val('');
                }
            });
        }
    });
});

setInterval(() => {
    $.ajax(url + "/chat/list").done(function(data) {
        let result = '';
        data = $.parseJSON(data);
        data.reverse();       
        $.each(data, function(key, item) {
            result += '<span class="text-muted">' + convertTimestamp(item.timestamp) + '</span> - ';
            if (item.usuario) {
                result += item.usuario
            } else {
                // result += '<span style="color: ' + color() + '">Anônimo</span>';
                result += 'Anônimo';
            } 
            result += ' - ';
            result += strip(item.mensagem) + '<br />';
        });
        $('#mensagens').html(result);
    });
}, 1000);

function strip(html) {
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent||tmp.innerText;
}

function convertTimestamp(timestamp) {
    var d = new Date(timestamp * 1000),	// Convert the passed timestamp to milliseconds
          hh = d.getHours(),
          h = hh,
          min = ('0' + d.getMinutes()).slice(-2),		// Add leading 0.
          ampm = 'AM',
          time;
              
      if (hh > 12) {
          h = hh - 12;
          ampm = 'PM';
      } else if (hh === 12) {
          h = 12;
          ampm = 'PM';
      } else if (hh == 0) {
          h = 12;
      }
      
      time = h + ':' + min + ' ' + ampm;
      return time;
}

function color() {
    let cores = ['#282a36','#44475a','#44475a','#f8f8f2','#6272a4','#8be9fd','#50fa7b','#ffb86c','#ff79c6','#bd93f9','#ff5555','#f1fa8c'];    
    let rdm = cores[Math.floor(Math.random() * cores.length)];
    return rdm;
}