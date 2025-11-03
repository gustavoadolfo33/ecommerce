<x-admin-layout :breadcrumbs="[
    [
        'name' => 'dashboard',
        'route' => route('admin.dashboard'),
        
    ],
    [
        'name' => 'Subcategorias',
        'rute' => route('admin.subcategories.index'),
    ],
    [
        'name' => 'Nuevo',
    ]
    ]">
    {{--<form action="{{route('admin.subcategories.store')}}" method="POST">

        @csrf
        <div class="card">

            <x-validation-errors class="mb-4" />

            <div class="mb-4">

                <x-label class="mb-2">
                    Categorias
                </x-label>
                <x-select name="category_id" id="category_id" class=" w-full">
                    <option value="" disabled selected class="text-gray-400">Seleccione una categoria...</option>
                    @foreach ($categories as $category)
                        
                        <option value="{{$category->id}}"
                            @selected(old('category_id') == $category->id)>

                            {{ $category->name }}
                        </option>
                    
                    @endforeach
                </x-select>

            </div>

             <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" 
                        placeholder="ingrese el nombre de la Categoria"
                        name="name"
                        value="{{old('name')}}"
                />
                    
            </div>
            <div class="flex justify-end">
                <x-button>
                    Guardar
                </x-button>
            </div>

        </div>
        

    </form> --}}
    @livewire('admin.subcategories.subcategory-create')
    

</x-admin-layout>