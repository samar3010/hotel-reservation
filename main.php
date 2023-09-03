<html>
    <body>
        <div>
            <form action="search.php" method="post">
                <label>Hotels: </label><br>
                <label>Hotel 1..</label><input type="checkbox" name="hotels">
                <label>Hotel 2..</label><input type="checkbox" name="hotels">
                <label>Hotel 3..</label><input type="checkbox" name="hotels"><br><br>
                <label>City: </label><select name="city">
                    <option checked value="any">Any</option>
                    <option value="cairo">Cairo</option>
                    <option value="alexandria">Alexandria</option>
                </select><br><br>

                <label>Room Type:</label><br>
                <label>Double:</label><input type="radio" name="type" value="double">
                <label>Single: </label><input type="radio" name="type" value="single">
                <label>Any: </label><input type="radio" name="type" value="ANY" checked><br><br>

                <label>Rating:</label><input name="rating"><br><br>
                <label>Price Range: </label><br>
                <label>From: </label><input type="number" name="minPrice"><label>To: </label><input type="number" name="maxPrice">
                <button type="submit">Submit</button>
            </form>
        </div>

        <script>
            
        </script>
    </body>
</html>