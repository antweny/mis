<ul id="tree1">
    @foreach($parents as $parent)
        <li>
            {{ $parent->name }}
            @if(count($parent->child))
                @foreach($parent->child as $district)
                    <p> > {{ $district->name }}</p>
                    @if(count($district->child))
                        @foreach($district->child as $ward)
                            <p>> {{ $ward->name }}</p>
                            @if(count($ward->child))
                                @foreach($ward->child as $street)

                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        </li>
    @endforeach
</ul>
