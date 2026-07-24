<div>
    @if ($errors->any())
        @foreach ($errors->all() as $e)
            <p style="color: red">{{ $e }}</p>            
        @endforeach
        
    @endif
</div>