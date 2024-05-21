
<x-app-layout>
  
   

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

<script>
$( document ).ready(function() {
   console.log( "ready!" );
   new DataTable('#example');
});

 
</script>


   <div class="py-12">
       <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               <div class="p-6 text-gray-900">
               <table id="example" class="cell-border compact stripe" style="width:100%">
                  
                    <thead>
                    <tr>
                   
                        <th>ID</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Services</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Branches</th>
                        <th>Edit</th>
                        <th>Delete</th>
                          
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($company as $c )
                   
                    <tr>
                    						
                        <td>{{$c->id}}</td>
                          
                        <td>
            {{ $c->logo }}
            <img src="{{ asset('storage/image/' . $c->logo) }}"width="100">
        </td>           
                        <td>{{ $c->name}}</td>
                        <td>{{ $c->email}}</td>
                        <td>{{ $c->mobile}}</td>
                        <td>{{$c->services}}</td>
                        <td>{{ $c->country}}</td>
                        <td>{{ $c->state}}</td>
                        <td>{{ $c->city}}</td>
                        <td>{{ $c->branches}}</td>
                        <td>
                        <a href="{{url('/company/edit/'.$c->id)}}">    
                        <x-primary-button class="ml-4">
                {{ __('Update') }}
            </x-primary-button></a></td>
                        <td><a href="{{url('/company/delete/'.$c->id)}}"> <x-danger-button class="ml-4">
                {{ __('Delete') }}
            </x-danger-button></a></td>

                    </tr>
                    

                    @endforeach
                    </tbody>
                  
                  </table>
               </div>
           </div>
       </div>
   </div>
</x-app-layout>
