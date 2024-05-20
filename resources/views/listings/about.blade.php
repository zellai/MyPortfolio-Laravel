<x-layout>

<div class="container">
    <div class="row">
        <section class="col relative h-72 flex flex-col justify-center align-center space-y-5 mb-4 mt-4">
            <div
                class="col absolute top-0 left-0 w-full h-full opacity-80 bg-no-repeat bg-center rounded"
                style="background-image: url('images/background.jpg'); padding:8rem"
            >
                <img class="rounded-circle border border-dark mx-auto d-block img-circle"
                    style="height: 18rem; width: 18rem" src="{{asset('images/mypicture.jpg')}}" alt="image" />
                <div class="flex flex-col justify-center align-center pt-4">
                    <h1 style="color: black; text-align: center; font-size: 2.5rem">Ezel M. Espera</h1>
                    <h1 style="color: black; text-align: center; font-size: 2rem; padding: 10px">Aspiring Software Engineer</h1>
                    <h1 style="color: black; text-align: center; font-size: 1rem; padding: 10px">BSECE</h1>
                    <h1 style="color: black; text-align: center; font-size: 1rem; padding: 10px"> Licensed Professional Teacher</h1>
                </div>
            </div>

        </section>

    <div class="col card text-light relative space-y-4 bg-secondary mt-4" style="max-width: 70rem; padding-top: 4rem; padding-bottom: 2rem">
        <div class="card-header">
            About Me
            </div>
                <p>Greetings! I am an enthusiastic software engineer with a diverse background in electronics engineering and teaching.
                    While I consider myself a beginner in the software engineering field, I am eager to learn and grow, constantly seeking opportunities to enhance my skills.
                    With a strong foundation in Laravel, HTML, Bootstrap, MySQL, and Python, I am ready to take on new challenges and contribute to meaningful projects.</p>
                <!-- <p>While I may be a beginner, I am confident that my background in electronics engineering, teaching experience, and foundational skills in Laravel, HTML, Bootstrap, MySQL, and Python make me a valuable asset to any team. I am eager to contribute to meaningful projects, expand my knowledge, and grow as a software engineer.</p> -->
                <p>If you are looking for a dedicated and motivated programmer with a strong desire to learn and contribute, I would be thrilled to connect and explore how we can collaborate to achieve our goals. Let's embark on this exciting journey together!</p>
                <p> For inquiries or info, contact me ;)</p>
                <a href="https://twitter.com/EzelMozo" class="text-white mt-6 py-2 rounded-xl hover:opacity-80" >
                    <i class="fa-brands fa-twitter fa-2x"></i>
                    @EzelMozo
                </a>
                <a href="https://www.facebook.com/ezel.i.mozo" class="text-white mt-6 py-2 rounded-xl hover:opacity-80" >
                    <i class="fa-brands fa-facebook fa-2x"></i>
                    ezel.i.mozo
                </a>
                <a href="https://www.instagram.com/ezelmozo/" class="text-white mt-6 py-2 rounded-xl hover:opacity-80" >
                    <i class="fa-brands fa-instagram fa-2x"></i>
                    ezelmozo
                </a>
                <a href="https://www.linkedin.com/in/ezel-espera-30a9b6200/" class="text-white mt-6 py-2 rounded-xl hover:opacity-80" >
                    <i class="fa-brands fa-linkedin fa-2x"></i>
                    ezel-espera
                </a>
                <a href="https://github.com/zellai" class="text-white mt-6 py-2 rounded-xl hover:opacity-80" >
                    <i class="fa-brands fa-github fa-2x"></i>
                    zellai
                </a>
            </div>
        </div>
    </div>


</x-layout>
