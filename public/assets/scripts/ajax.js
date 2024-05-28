
function xhttp(url, method = 'GET')
{
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        if(this.status === 200)
        {
            return this.responseText;
        }
    }
    xhttp.open(method, url);
    xhttp.send();
}

