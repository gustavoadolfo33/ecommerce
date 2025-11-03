<x-admin-layout :breadcrumbs="[
    [
        'name' => 'dashboard',
        'route' => route('admin.dashboard'),
        
    ],
    [
        'name' => 'Familias',
        'rute' => route('admin.families.index'),
    ],
    [
        'name' => $family->name,
    ]
]">

      <div class="card">

        <form action="{{route('admin.families.update', $family)}}" method="POST">

            @csrf

            @method('PUT')

            <div class="mb-4">
                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" 
                        placeholder="ingrese el nombre de la familia"
                        name="name"
                        value="{{old('name', $family->name)}}"
                />
                    
            </div>
            <div class="flex justify-end">
                
                <x-danger-button onclick="confirmDelete()">
                    Eliminar
                </x-danger-button>

                <x-button class="ml-2">
                    Actualizar
                </x-button>
            </div>





        </form>

    </div>

        <form action="{{ route('admin.families.destroy', $family)}}" 
        method="POST"
        id="delete-form">

        @csrf
        @method('DELETE')

        </form>

        @push('js')
        
            <script>
                function confirmDelete(){
                    /*document.getElementById('delete-form').submit(); */
                    Swal.fire({
                        title: "Estas seguro?",
                        text: "No podras revertir esto!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Borrar",
                        cancelButtonText:"Cancelar"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            /*Swal.fire({
                            title: "Eliminado!",
                            text: "su archivo ha sido eliminado.",
                            icon: "success"
                            });*/

                            document.getElementById('delete-form').submit(); 
                        }
                    });
                    
                }
            </script>
        
        @endpush


</x-admin-layout>