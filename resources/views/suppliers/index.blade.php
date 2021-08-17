<!-- Regency -->
<select name="regency_id" id="add-supplier-regency-id" value="{{ old('regency_id') }}">

</select>

<script>
    $(function() {
        @if(old('regency_id'))
            // Panggil ajax get all regency yg id-nya = regency_id
            $.get({
                url: '{{ url('regencies') }}?id={{ old('regency_id') }}',
                success: (regencies) {
                    // Append <option> ke $('#add-supplier-regency-id')
                    $('#add-supplier-regency-id').val('{{ old('regency_id') }}')
                },
            })
        @endif
    })
</script>
