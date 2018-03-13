$(document).ready(function () {
  document.getElementById("current-button").onclick = function() {
    document.getElementById("upcoming").style.display = "none"
    document.getElementById("current").style.display = "block";
    document.getElementById("passed").style.display = "none";
  }

  document.getElementById("upcoming-button").onclick = function() {
    document.getElementById("upcoming").style.display = "block";
    document.getElementById("current").style.display = "none";
    document.getElementById("passed").style.display = "none";
  }

  document.getElementById("passed-button").onclick = function() {
    document.getElementById("upcoming").style.display = "none";
    document.getElementById("current").style.display = "none";
    document.getElementById("passed").style.display = "block";
  }

  setTimeout(function(){ document.getElementById("welcome-message").classList.add("fadeOutLeft") }, 3000);
});
