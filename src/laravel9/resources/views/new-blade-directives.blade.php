<label>

    Checked Directive
    <input type="checkbox" value="active" name="status" @checked(old('status') == 'active')> {{--Will add checked property value is active--}}

</label>


<label>
    Selected Directive
    <select name="skills">
        <option selected disabled>Please Select One Skill</option>
        @foreach(['php' , 'html' , 'css'] as $skill)
            <option @selected($skill == 'html')>{{ $skill }}</option> {{--Will add seleced property for html option--}}
        @endforeach
    </select>

</label>
