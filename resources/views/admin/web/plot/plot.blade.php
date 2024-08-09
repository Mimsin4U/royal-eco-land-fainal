@extends('admin.master')
@section('body')
    @include('notify.notify')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add plot form</h4>
                    <form class="form-horizontal repeater_parent" action="{{route('plot.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Plot Name</label>
                            <div class="col-9">
                                <input type="text"  name="pl_name" class="form-control"  id="name" placeholder="Plot Name"/>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="name" class="col-3 col-form-label">Plot Number</label>
                            <div class="col-9">
                                <input type="text"  name="number" class="form-control"  id="number" placeholder="Plot Number"/>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="location" class="col-3 col-form-label">Project</label>
                            <div class="col-9">
                                <select name="plot_project_id"  class="form-control"  id="plot_project_id">
                                    <option value="">Select Project</option>
                                    @foreach ($project as  $pr)
                                        <option value="{{$pr->id}}">{{$pr->p_name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="location" class="col-3 col-form-label">Plot Category</label>
                            <div class="col-9">
                                <select name="plot_category_id" class="form-control"  id="plot_category_id">
                                    <option value="">Select Plot Category</option>
                                    @foreach ($plotCategory as  $pltCat)
                                        <option value="{{$pltCat->id}}">{{$pltCat->plc_name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div> 
                        <div class="row mb-3 "> 
                            <label for="logo" class="col-3 col-form-label plot_cat_type_price_lebel"  style="">Plot Type </label> 
                            <div class="col-9 ">  
                                    <select name="plot_category_type_id"  class="form-control plot_category_type_id"  id="plot_category_type_id">
                                      
                                    </select> 
                            </div> 
                        </div>
                         
                        <div class="row mb-3 ">
                            <label for="plot_size" class="col-3 col-form-label">Plot Size</label>
                            <div class="col-9">
                                <input type="number"  name="plot_size" class="form-control"  id="plot_size" placeholder="Plot Size"/>
                            </div>
                        </div> 
                        <div class="row mb-3 ">
                            <label for="total_price" class="col-3 col-form-label">Total Price</label>
                            <div class="col-9">
                                <input type="hidden"  name="unit_price" value="" class="form-control"  id="unit_price" placeholder=""/>

                                <input type="number" disabled  name="total_price" class="form-control"  id="total_price" placeholder="Total Price"/>
                            </div>
                        </div> 
                        
                        <div class="row mb-3">
                            <label for="plotImage" class="col-3 col-form-label">Images :</label>
                            <div class="col-9">
                                <input type="file" name="p_images[]" class="form-control"  id="plotImage" multiple/>
                            </div>
                        </div> 
                        <div class="row mb-3 ">
                            <label for="description" class="col-3 col-form-label">description</label>
                            <div class="col-9">
                                <textarea id="simplemde1" name="description"></textarea> 
                            </div>
                        </div> 
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" class="btn btn-info">Create New plot</button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection
@section('script')

<script type="text/javascript"> 
    $(document).on('change', '#plot_category_id', function(e) { 
        var this_ele 		= $(this);
        var plot_category_id = this_ele.val();
        var repeater_parent = this_ele.parents('.repeater_parent');
        var route_name_set 	= repeater_parent.find('div.plot_cat_type_price_div'); 
        var test = ' <option value=""> Select Category Type </option>';    
        // var test = ''
        $.ajax({
            type    : "get",
            url     : "{{ url('plotCategoryTypeData') }}/"+plot_category_id,
            dataType: "json", 
            success : function(responce){
                // console.log(responce.rows); 
                $.each(responce.rows, function( i, v ) {  
                    test+='<option value="'+v.plot_type_id+'" price="'+v.unit_price+'">' + v.plt_name+' | '+ v.unit_price;
                    test += '</option> ';  
                }); 
                
                $('.plot_category_type_id').html(test);
            },
            error: function(data){
            alert("Error")
        }
        });
    }) ;
 

    $('#plot_size').on('keyup',function (){ 
        var this_ele 		= $(this);
        var plot_size = this_ele.val();
        var type_price = $('#plot_category_type_id option:selected').attr('price');
        $('#unit_price').val(type_price); 
        var totalPrice = (Number(plot_size)*Number(type_price))
        $('#total_price').val(totalPrice);
                      
    });
</script>

@endsection
