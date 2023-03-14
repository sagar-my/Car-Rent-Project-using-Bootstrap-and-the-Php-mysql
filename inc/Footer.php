</div>
<footer class="px-2 py-3 text-center" style="background-color:#c1cfe3 ; ">
    <p id="team" class="text-center h1"></p>
    <span class="text-center">@copyright Krishna</span>
</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>

<script>
    let team=document.getElementById("team");

team.innerHTML=new Date().toLocaleTimeString();
setInterval(()=>{
    team.innerHTML=new Date().toLocaleTimeString();
},1000)
</script>