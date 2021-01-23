var data = new FormData();
data.append("fileUpload", fileInput.files[0], "/C:/Users/nemat/Desktop/Capture.PNG");

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function() {
    if (this.readyState === 4) {
        console.log(this.responseText);
    }
});

xhr.open("POST", "http://127.0.0.1/d/ui/upload.php");
xhr.setRequestHeader("Cookie", "PHPSESSID=ik6f480vp4sjh3vl3bogoksj1o");

xhr.send(data);