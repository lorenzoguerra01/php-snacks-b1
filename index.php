<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- emta per media query  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- collegamento font awsome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- collegamento my-css  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- collegamento bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- collegamento bootstrap-js  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"
        defer></script>
    <!-- collegamento vue-js  -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- collegamento libreria luxon  -->
    <script src="https://cdn.jsdelivr.net/npm/luxon@3.4.4/build/global/luxon.min.js"></script>
    <!-- collegamento google font  -->

</head>

<body>
    <div id="app" class="ms_screen text-center">
        <h1>PHP Snacks</h1>
        <div class="card ms_card">
            <form action="index.php" method="get" class=" p-3 ">
                <select name="snacks">
                    <option value="">Select Snack</option>
                    <option value="snack1">1</option>
                    <option value="snack2">2</option>
                    <option value="snack3">3</option>
                    <option value="snack4">4</option>
                    <option value="snack5">5</option>
                    <option value="snack6">6</option>
                    <option value="snack7">7</option>
                </select>
                <input type="submit" value="Submit">
            </form>
            <?php
            if (isset($_GET['snacks'])) {
                $snacks = $_GET['snacks'];
                switch ($snacks) {
                    case 'snack1':
                        /*
                        Creiamo un array contenente le partite di basket di un’ipotetica tappa del calendario. Ogni array avrà una squadra di casa e una squadra ospite,
                        unti fatti dalla squadra di casa e punti fatti dalla squadra ospite. Stampiamo a schermo tutte le partite con questo schema:
                        Olimpia Milano - Cantù | 55-60
                        */
                        echo 'Snack 1' . '<br><br>';
                        $games = [
                            ['HomeTeam' => 'Hawks', 'AwayTeam' => 'Timberwolves', 'HomeTeamScore' => 91, 'AwayTeamScore' => 86],
                            ['HomeTeam' => 'Nuggets', 'AwayTeam' => 'Pacers', 'HomeTeamScore' => 97, 'AwayTeamScore' => 88],
                            ['HomeTeam' => 'Warriors', 'AwayTeam' => 'Grizzlies', 'HomeTeamScore' => 106, 'AwayTeamScore' => 92],
                            ['HomeTeam' => 'Spurs', 'AwayTeam' => 'Rockets', 'HomeTeamScore' => 98, 'AwayTeamScore' => 83],
                            ['HomeTeam' => 'Pelicans', 'AwayTeam' => 'Clippers', 'HomeTeamScore' => 107, 'AwayTeamScore' => 86],
                            ['HomeTeam' => 'Hornets', 'AwayTeam' => 'Trail Blazers', 'HomeTeamScore' => 104, 'AwayTeamScore' => 89],
                            ['HomeTeam' => 'Kings', 'AwayTeam' => 'Jazz', 'HomeTeamScore' => 102, 'AwayTeamScore' => 85],
                            ['HomeTeam' => 'Knicks', 'AwayTeam' => '76ers', 'HomeTeamScore' => 97, 'AwayTeamScore' => 82],
                            ['HomeTeam' => 'Bucks', 'AwayTeam' => 'Bulls', 'HomeTeamScore' => 87, 'AwayTeamScore' => 81]
                        ];
                        foreach ($games as $game) {
                            echo $game['HomeTeam'] . ' | ' . $game['HomeTeamScore'] . '-' . $game['AwayTeamScore'] . ' | ' . $game['AwayTeam'] . '<br>';
                        }
                        break;

                    case 'snack2':
                        /*
                        Con un form passare come parametri GET name, mail e age e verificare (cercando i metodi che non conosciamo nella documentazione) 
                        che name sia più lungo di 3 caratteri, che mail contenga un punto e una chiocciola e che age sia un numero. 
                        Se tutto è ok stampare “Accesso riuscito”, altrimenti “Accesso negato”
                        */
                        echo 'Snack 2' . '<br><br>';
                        echo "<form action='index.php' method='get'>
                        <input type='hidden' name='snacks' value='$snacks'>
                        <input type='text' name='name' placeholder='name'>
                        <input type='text' name='email' placeholder='email'>
                        <input type='text' name='age' placeholder='age'>
                            <input type='submit' value='Submit'>
                        </form>";
                        if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['age'])) {
                            $name = $_GET['name'];
                            $email = $_GET['email'];
                            $age = $_GET['age'];

                            if (strlen($name) > 3) {
                                echo "Name is valid.<br>";
                            } else {
                                echo "Name must be longer than 3 characters.<br>";
                            }

                            if (strpos($email, '.') !== false && strpos($email, '@') !== false) {
                                echo "Email is valid.<br>";
                            } else {
                                echo "Email must contain a dot and an @.<br>";
                            }

                            if (is_numeric($age)) {
                                echo "Age is valid.<br>";
                            } else {
                                echo "Age must be a number.<br>";
                            }
                        }

                        break;

                    case 'snack3':
                        /*
                        Creare un array di array. Ogni array figlio avrà come chiave una data in questo formato: DD-MM-YYYY es 01-01-2007 e 
                        come valore un array di post associati a quella data. Stampare ogni data con i relativi post.
                        Qui l’array di esempio: https://www.codepile.net/pile/R2K5d68z
                        */
                        echo 'Snack 3' . '<br><br>';
                        $posts = [
                            '01/03/2020' => [
                                [
                                    'title' => 'Hello World!',
                                    'author' => 'Alice Smith',
                                    'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
                                ],
                                [
                                    'title' => 'My first post',
                                    'author' => 'Alice Smith',
                                    'text' => 'Vestibulum nec lectus et lectus dignissim.'
                                ],
                            ],
                            '02/03/2020' => [
                                [
                                    'title' => 'My second post',
                                    'author' => 'Alice Smith',
                                    'text' => 'Pellentesque aliquam leo sit amet quam blandit.'
                                ],
                            ],
                            '03/03/2020' => [
                                [
                                    'title' => 'My third post',
                                    'author' => 'Alice Smith',
                                    'text' => 'Sed eu posuere felis, eget ultrices sapien.'
                                ],
                            ],
                            '04/03/2020' => [
                                [
                                    'title' => 'My fourth post',
                                    'author' => 'Alice Smith',
                                    'text' => 'Sed ac augue risus.'
                                ],
                            ],
                        ];

                        foreach ($posts as $date => $postsArray) {
                            echo "<h2>$date</h2>";
                            foreach ($postsArray as $post) {
                                echo "<h3>$post[title]</h3>";
                                echo "<span>by $post[author]</span>";
                                echo "<p>$post[text]</p>";
                            }
                        }

                        break;

                    case 'snack4':
                        /*
                        Creare un array con 15 numeri casuali, tenendo conto che l’array non dovrà contenere lo stesso numero più di una volta
                        */
                        echo 'Snack 4' . '<br><br>';
                        $randomNumbers = [];
                        while (count($randomNumbers) < 15) {
                            $randomNumber = rand(1, 100);
                            if (!in_array($randomNumber, $randomNumbers)) {
                                $randomNumbers[] = $randomNumber;
                            }
                        }
                        echo 'Numbers: ' . implode(', ', $randomNumbers) . '<br><br>';

                        break;

                    case 'snack5':
                        /*
                        Prendere un paragrafo abbastanza lungo, contenente diverse frasi. Prendere il paragrafo e suddividerlo in tanti paragrafi. 
                        Ogni punto un nuovo paragrafo.
                        */
                        echo 'Snack 5' . '<br><br>';
                        $text = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras imperdiet, nunc sit amet imperdiet dictum, augue mi lobortis dolor, non finibus nibh mi in nulla. Nulla non libero non quam ultrices mattis. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus ut tellus risus. Donec sed purus ut lectus mattis aliquet. Maecenas eleifend lectus eget malesuada auctor. Sed ut ex ut nulla aliquet malesuada.';
                        $paragraphs = explode('. ', $text);
                        var_dump($paragraphs);
                        foreach ($paragraphs as $paragraph) {
                            echo '<p>' . $paragraph . '.</p>';
                        }

                        break;

                    case 'snack6':
                        /*
                        Utilizzare questo array: https://pastebin.com/CkX3680A. Stampiamo il nostro array mettendo gli insegnanti in un rettangolo grigio e 
                        i PM in un rettangolo verde.
                        */
                        echo 'Snack 6' . '<br><br>';
                        $db = [
                            'teachers' => [
                                [
                                    'name' => 'Michele',
                                    'lastname' => 'Papagni'
                                ],
                                [
                                    'name' => 'Fabio',
                                    'lastname' => 'Forghieri'
                                ]
                            ],
                            'pm' => [
                                [
                                    'name' => 'Roberto',
                                    'lastname' => 'Marazzini'
                                ],
                                [
                                    'name' => 'Federico',
                                    'lastname' => 'Pellegrini'
                                ]
                            ]
                        ];
                        foreach ($db as $type => $array) {
                            foreach ($array as $item) {
                                echo '<div style="background-color:'. ($type == 'teachers' ? 'lightgrey' : 'lightgreen') .'">';
                                echo '<p>' . $item['name'] . ' ' . $item['lastname'] . '</p>';
                                echo '</div>';
                            }
                        }
                        
                        break;

                    case 'snack7':
                        /*
                        Creare un array contenente qualche alunno di un’ipotetica classe. Ogni alunno avrà Nome, Cognome e un array contenente 
                        i suoi voti scolastici. Stampare Nome, Cognome e la media dei voti di ogni alunno.
                        */
                        echo 'Snack 7' . '<br><br>';
                        $students = [
                            [
                                'name' => 'Maria',
                                'lastname' => 'Rossi',
                                'votes' => [8, 9, 7, 6, 8]
                            ],
                            [
                                'name' => 'Giovanni',
                                'lastname' => 'Verdi',
                                'votes' => [9, 10, 9, 8]
                            ],
                            [
                                'name' => 'Lorenzo',
                                'lastname' => 'Bianchi',
                                'votes' => [7, 8, 9]
                            ],
                            [
                                'name' => 'Sara',
                                'lastname' => 'Neri',
                                'votes' => [10, 8, 9, 10, 8]
                            ],
                            [
                                'name' => 'Giulia',
                                'lastname' => 'Rizzi',
                                'votes' => [8, 8, 9, 8]
                            ],
                            [
                                'name' => 'Alessandro',
                                'lastname' => 'Ferrari',
                                'votes' => [9, 9, 10, 9]
                            ],
                            [
                                'name' => 'Marta',
                                'lastname' => 'Vivaldi',
                                'votes' => [8, 9, 9, 9]
                            ],
                            [
                                'name' => 'Andrea',
                                'lastname' => 'Rossi',
                                'votes' => [10, 9, 10, 9, 8]
                            ],
                            [
                                'name' => 'Antonio',
                                'lastname' => 'Bianchi',
                                'votes' => [8, 8, 8, 9, 9]
                            ],
                            [
                                'name' => 'Lucia',
                                'lastname' => 'Neri',
                                'votes' => [8, 9, 9, 9, 9]
                            ]
                        ];
                        foreach ($students as $student) {
                            echo $student['name'] . ' ' . $student['lastname'] . ': ' . array_sum($student['votes']) / count($student['votes']) . '<br>';
                        }

                        break;
                }
            }
            ?>
        </div>
    </div>
</body>

</html>