<form class="lg:px-4 rounded w-full" action="/contactar" method="post">
    @csrf
<!--  <h2 class="text-center text-3xl my-2">Contacto</h2> -->
    <div class="mb-4">
        <!-- <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Nombre</label> -->
        <input name="nombre" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline py-3" id="username" type="text" placeholder="Nombre" value="{{old('nombre')}}">
        @if($errors->has('nombre'))
            <span class="error">{{$errors->first('nombre')}}</span>
        @endif
    </div>
    <div class="mb-4">
        <!-- <label class="block text-gray-700 text-sm font-bold mb-2" for="nombre">Teléfono</label> -->
        <input name="telefono" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline py-3" id="username" type="number" placeholder="(011) 44444444" value="{{old('telefono')}}">
        @if($errors->has('telefono'))
            <span class="error">{{$errors->first('telefono')}}</span>
        @endif
    </div>
    <div class="mb-4">
        <!-- <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Email</label> -->
        <input name="correo" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline py-3" id="email" type="email" placeholder="Email" value="{{old('correo')}}">
        @if($errors->has('correo'))
            <span class="error">{{$errors->first('correo')}}</span>
        @endif
    </div>
    <div>
        <!--  <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Mensaje</label> -->
        <textarea name="mensaje" class="appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline resize-none h-24" placeholder="Mensaje" id="consulta-home">{{old('mensaje')}}</textarea>
        @if($errors->has('mensaje'))
            <span class="error">{{$errors->first('mensaje')}}</span>
        @endif
    </div>
    <div class="flex items-center justify-center lg:justify-start">
        <input class="btn btn-uno p-2 px-8 my-4" type="submit" value="Contactate">
    </div>
</form>