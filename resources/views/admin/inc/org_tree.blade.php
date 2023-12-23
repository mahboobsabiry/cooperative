<div class="tree m-2">
    <ul>
        <li>
            <a href="javascript:void(0)"
               style="background: #ba8b00; color: beige">{{ $position->title }}</a>
            <ul>
                <!-- If Department -->
                @if($position->position_number == 2)
                    @foreach($position->children as $admin)
                        <li>
                            <a href="{{ route('admin.positions.show', $admin->id) }}"
                               target="_blank"
                               style="background: burlywood;">{{ $admin->title }}</a>
                            <ul>
                                @foreach($admin->children as $mgmt)
                                    <li>
                                        <a href="{{ route('admin.positions.show', $mgmt->id) }}"
                                           target="_blank"
                                           style="background: bisque;">{{ $mgmt->title }}</a>
                                        <ul>
                                            @foreach($mgmt->children as $mgr)
                                                <li>
                                                    <a href="{{ route('admin.positions.show', $mgr->id) }}"
                                                       target="_blank"
                                                       style="background: beige;">{{ $mgr->title }} ({{ count($mgr->employees) }})</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                    <!--/==/ End of Department Organization -->

                    <!-- If Administration -->
                @elseif($position->position_number == 3)
                    @foreach($position->children as $mgmt)
                        <li>
                            <a href="{{ route('admin.positions.show', $mgmt->id) }}"
                               target="_blank"
                               style="background: bisque;">{{ $mgmt->title }}</a>
                            <ul>
                                @foreach($mgmt->children as $mgr)
                                    <li>
                                        <a href="{{ route('admin.positions.show', $mgr->id) }}"
                                           target="_blank"
                                           style="background: beige;">{{ $mgr->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach

                    <!-- If General Management -->
                @elseif($position->position_number == 4)
                    @foreach($position->children as $child)
                        <li>
                            <a href="{{ route('admin.positions.show', $child->id) }}"
                               target="_blank"
                               style="background: beige;">{{ $child->title }}</a>
                        </li>
                    @endforeach
                @else
                @endif
            </ul>
        </li>
    </ul>
</div>
