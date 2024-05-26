<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | Home</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="logo.png" />
    <script src='main.js'></script>
</head>
<body>
    <header class="mainHeader">
        <div class="logo">
            <img src="logo.png" height="70px">
            <h1>DataStruct School</h1>
        </div>
        <nav>
            <ul>
                <li>Página Principal</li>
                <li>Temas</li>
            </ul>
            <section>
                <button>Cadastrar-se</button>
                <button class="join">Entrar</button>
            </section>
        </nav>
    </header>
    <main>
        <section class="carrossel">
            <div class="active">
                <h1>Bom dia</h1>
            </div>
            <div>
                <h1>Boa Tarde</h1>
            </div>
            <div>
                <h1>Bom Noite</h1>
            </div>
            <section class="marker">
                <i class='bx bxs-circle' id="active"></i>
                <i class='bx bxs-circle'></i>
                <i class='bx bxs-circle'></i>
            </section>
        </section>
        <section class="about">
            <div class="top">
                <section class="info">
                    <i class='bx bxs-smile'></i>
                    <div>
                        <h3>Lorem ipsum dolor sit amet</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis sequi incidunt, quod quaerat excepturi rerum reprehenderit</p>
                    </div>
                </section>
                <section class="info">
                    <i class='bx bxs-moon' ></i>
                    <div>
                    <h3>Lorem ipsum dolor sit amet</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis sequi incidunt, quod quaerat excepturi rerum reprehenderit</p>
                    </div>
                </section>
                <section class="info">
                    <i class='bx bxs-hot' ></i>
                    <div>
                    <h3>Lorem ipsum dolor sit amet</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis sequi incidunt, quod quaerat excepturi rerum reprehenderit</p>
                    </div>
                </section>
            </div>
            <h2>Entre na comunidade DataStruct e conecte-se a mais 1M de alunos</h2>
            <section class="opnioes">
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos deleniti recusandae error obcaecati porro similique quidem</p>
                    <div>
                        <img>
                        <div class="text">
                            <h3>André D.</h3>
                            <span>Software Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos deleniti recusandae error obcaecati porro similique quidem</p>
                    <div>
                        <img>
                        <div class="text">
                            <h3>André D.</h3>
                            <span>Software Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos deleniti recusandae error obcaecati porro similique quidem</p>
                    <div>
                        <img>
                        <div class="text">
                            <h3>André D.</h3>
                            <span>Software Engineer</span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <i class='bx bxs-quote-alt-right' ></i>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos deleniti recusandae error obcaecati porro similique quidem</p>
                    <div>
                        <img>
                        <div class="text">
                            <h3>André D.</h3>
                            <span>Software Engineer</span>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
    <script>
        let i = 0
        function switchCarrossel(){
            const alldivs = document.querySelectorAll(".carrossel div")
            const makers = document.querySelectorAll(".marker i")
            makers.forEach(i => {
                i.id = ""
            })
            alldivs.forEach(div => {  
                div.classList.value = ""
            })
            alldivs[i].classList.add('active')
            makers[i].id = 'active'
            if(i < 2){
                i++
            }else{
                i = 0
            }
        }

        setInterval(switchCarrossel,2000)
    </script>
</body>
</html>