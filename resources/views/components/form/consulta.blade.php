<form id="consultar" class="md:w-6/12 lg:w-4/12 bg-white shadow-md rounded p-8 mb-4 m-auto" action="/preguntar" method="post">
    @csrf
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
            Tema
        </label>
        <input name="tema" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="username" type="text">
        @if($errors->has('tema'))
            <span class="error">{{$errors->first('tema')}}</span>
        @endif
    </div>
    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
            Consulta
        </label>
        <textarea name="consulta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline resize-none"
            id="consulta"></textarea>
        @if($errors->has('consulta'))
            <span class="error">{{$errors->first('consulta')}}</span>
        @endif
    </div>
    <div class="flex items-center justify-center">
        <input class="btn btn-dos p-2 px-8 my-4"
            type="submit" value="Enviar mensaje">
    </div>
</form>