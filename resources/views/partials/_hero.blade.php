   <section
   class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
>
   <div class="z-10">
       <h1 class="text-6xl font-bold  text-white">
           Remo<span class="text-black">Work</span>
       </h1>
       <p class="text-2xl text-gray-200 font-bold my-4">
           Find or post software jobs
       </p>
       
       @auth

       Now as an employer you can get your great skills appreciated :D
       <br>
       And as a company you can hire great engineers from all over the world ^_^
       @else

       <div>
        <a
            href="register"
            class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
            >Sign Up to Post a Job</a
        >
      </div>

       @endauth
   </div>
</section>