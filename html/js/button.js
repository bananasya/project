var count = 0;
document.getElementById("myButton").onclick = function() {
    count++;
    if (count % 2 == 0){
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src = "https://grizly.club/uploads/posts/2023-02/1676466078_grizly-club-p-nadpis-barbi-klipart-1.png";
        document.getElementById("demo").appendChild(img);
    }
}