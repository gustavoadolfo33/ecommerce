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
        'name' => $subcategory->name,
    ]
    ]">


            @livewire('admin.subcategories.subcategory-edit', ['subcategory' => $subcategory])
    


</x-admin-layout>