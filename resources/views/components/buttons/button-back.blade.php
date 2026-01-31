@props(['route', 'name' => 'empty'])

<a href="{{ $route }}" 
   class="bg-white text-center w-48 rounded-2xl h-14 relative text-black text-xl font-semibold group flex items-center justify-center m-3">
    
    <div class="bg-green-400 rounded-xl h-12 w-1/4 flex items-center justify-center absolute left-1 top-[4px] group-hover:w-[184px] z-10 duration-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024" height="25px" width="25px">
            <path d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z" fill="#000000"></path>
            <path d="m237.248 512 265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z" fill="#000000"></path>
        </svg>
    </div>

    {{ $name }}
</a>

<!--
Lo único que se veía en el cuarto era la cherry
A casa de los pai bajaba con Polo y Sperry
Espero que me espere'
Y que si estás con un cabrón algún día, mami, pelee' y te deje'

Y ahí me tire' (me tire')
Cuando la veas solita, Luna, dile
Que yo mato por ella y porque esos ojo' me miren
Yo le pido a Dios que ese culito vire 
 -->
