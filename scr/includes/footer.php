    <script type="text/javascript">
        function colorChange() {
            var bgColor = prompt("Enter hex color", "");
            document.body.style.backgroundColor = bgColor;
        }
    </script>
    <script>
        function containerChange() {
            var contColor = prompt("Enter hex color for main body", "");
            document.getElementById("conteinerMarketing").style.backgroundColor = contColor;
        }
        function txtContainerChange() {
            var txtColor = prompt("Enter hex color for main body", "");
            document.getElementById("conteinerMarketing").style.color = txtColor;
        }
    </script>

<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>

    <p>&copy; Your Hotel In Action 2015. &middot; <a href="#">Privacy</a> &middot; </p>
   <!-- <button type="button" class="btn btn-warning" onclick="colorChange()">Bg Changer</button>
    <button type="button" class="btn btn-warning" onclick="containerChange()">Conteiner Changer</button>
    <button type="button" class="btn btn-warning" onclick="txtContainerChange()">txt change on Body</button>


    <a href="admin.php">
        <button type="button" class="btn btn-primary">Admin Panel</button>
    </a>-->
  <!--  <a href="userProfile.php">
        <button type="button" class="btn btn-primary">User Profile</button>
    </a>-->


</footer>