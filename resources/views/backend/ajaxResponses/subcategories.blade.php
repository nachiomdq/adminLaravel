<select class="form-control" id="subcategories"  name="subcategories[]" multiple="multiple">
   <option></option>
   @foreach($subcategories as $subcategory)
     <option value="{{$subcategory->id}}" >{{$subcategory->name}}</option>
   @endforeach
</select>
