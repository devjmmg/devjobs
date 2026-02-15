<div class="p-6 text-gray-900">
    <h1 class="text-2xl font-bold py-2">{{$vacant->title}}</h1>
    <div class="bg-gray-100 p-4 rounded grid md:grid-cols-2 gap-4">
        <p class="text-base font-semibold">Empresa:
            <span class="font-normal">{{$vacant->enterprise}}</span>
        </p>
        <p class="text-base font-semibold">Último día para postularse:
            <span class="font-normal">{{$vacant->last_day->format('d-m-Y')}}</span>
        </p>
        <p class="text-base font-semibold">Categoría:
            <span class="font-normal">{{$vacant->category->category}}</span>
        </p>
        <p class="text-base font-semibold">Salario:
            <span class="font-normal">{{$vacant->salary->salary}}</span>
        </p>
    </div>
    
    <div class="my-10 grid md:grid-cols-6 gap-4">
        <div class="md:col-span-3 lg:col-span-2 ">
            <img src="{{asset('storage/vacants/' . $vacant->image)}}" alt="Imagen {{$vacant->title}}">
        </div>
        <div class="p-5 md:col-span-3 lg:col-span-4">
            <p class="text-base font-semibold">Descripción:             
            </p>
            <p class="font-normal whitespace-pre-line">{{$vacant->description}}</p>
        </div>
    </div>

    @guest
        <div class="bg-gray-100 p-4 rounded text-center">
            <p>
                ¿Deseas aplicar a esta vacante? <a class="font-semibold text-lime-500" href="{{route('register')}}">Obten una cuenta y aplica a está y otras vacantes.</a>
            </p>
        </div>    
    @endguest
</div>