



<html>

<body>
    <h2>Program to stop form refreshing page on submit in JavaScript using <i>fetch form submit</i></h2>
    <form id="fetchForm" onsubmit="submitFormFetch();">
        <label for="city">RaceCourse:</label>
        <select name="racecourse" id="racecourse">
            <option value="ascot">Ascot</option>
            <option value="belmont">Belmont</option>
        </select><br><br>
        <input type="submit" value="Submit!" />
    </form>
    <script>
        function submitFormFetch(event) {
            var fetchForm = document.getElementById("fetchForm");
            var data = new FormData(fetchForm);
            fetch('../php_script/update_session.php', {
                    method: "post",
                    body: data
                })
                .then((res) => {
                    // return res.text();
                })
                .then((txt) => {
                    alert("Submit Success");
                })
                .catch((err) => {
                    alert(err);
                });
            console.log('Formdata:', data);
            return false;
        }
    </script>
</body>

</html>