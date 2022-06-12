var acc = document.getElementsByClassName("accordionalmondb");
var i;
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener('click', function() {
        this.classList.toggle('almondbactive');
        var panelalmondb = this.nextElementSibling;
        if (panelalmondb.style.display === 'block') {
            panelalmondb.style.display = 'none';
        } else {
            panelalmondb.style.display = 'block';
        }
    });
}
function TopnavFunction() {
    var acc = document.getElementsByClassName('mycourse20');
    var j;
    var topnav = document.getElementsByClassName('coursetopnavicon');
    topnav[0].classList.toggle('coursetopnavactive');
    for (j = 0; j < acc.length; j++) {
        if (acc[j].style.display === "block") {
            acc[j].style.display = "none";
          } else {
            acc[j].style.display = "block";
          }
    }
}
function TopnavFunction1() {
    var acc = document.getElementsByClassName('coursesection30');
    var j;
    var topnav = document.getElementsByClassName('coursetopnavicon1');
    topnav[0].classList.toggle('coursetopnavactive1');
    for (j = 0; j < acc.length; j++) {
        if (acc[j].style.display === "block") {
            acc[j].style.display = "none";
          } else {
            acc[j].style.display = "block";
          }
    }
}