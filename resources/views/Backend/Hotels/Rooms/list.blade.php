<h3 class="head text-center">List of Rooms</h3>
<div class="responsive-table">
    <table id="datatables-example" class="table table-striped table-bordered table-dark"
           width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>Room Name</th>
            <th>Room Type</th>
            <th>Hotel Name</th>
            <th>Rate per Day</th>
            <th>No of Adults per room</th>
            <th>No of child per room</th>

            <th>Rate EP Plan per  Day</th>
            <th>Rate Ap plan per Day</th>
            <th>Rate MAP plan per Day</th>
            <th>Rate CP Plan per Day</th>
            <th>No of Extra bed per room</th>
            <th>Cost per Extra bed Day</th>

            <th>Room Amenities</th>
            <th>Room Srvices</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($rooms as $room)
            <tr>

                <td>{{$room->name}}</td>
                <td>{{$room->roomTypes->room_type}}</td>
                <td>{{$room->hotels->hotel_name}}</td>
                <td>{{$room->room_cost}}</td>
                <td>{{$room->no_of_adult}}</td>
                <td>{{$room->no_of_child}}</td>
                <td>{{$room->rate_ep_plan}}</td>
                <td>{{$room->rate_ap_plan}}</td>
                <td>{{$room->rate_map_plan}}</td>
                <td>{{$room->rate_cp_plan}}</td>
                <td>{{$room->max_extra_bed_up}}</td>
                <td>{{$room->cost_per_extra_bed}}</td>



                <td>@forelse($room->HotelRoomAmenity as $room_amenity)
                        {{$room_amenity->amenity_name}} ,
                    @empty
                    @endforelse</td>
                <td>@forelse($room->HotelRoomService as $room_service)
                        {{$room_service->service_name}} ,
                    @empty
                    @endforelse</td>
                <td>
                    <a href="{{route('rooms.details',$room->id)}}"> <span class="label label-info">View</span></a>
                    <a href="{{route('rooms.edit',$room->id)}}"><span class="label label-warning">Edit</span></a>
                    <a href="{{route('rooms.images',$room->id)}}" ><span class="label label-warning">Hotel Room Image Gallery</span></a>
                    {{--<a href="{{route('bookingsRoom.add',[$data['location_city'],$data['start_date'],$data['end_date'],$data['no_of_people']])}}"><input type="submit" class="btn btn-circle btn-sm" value="Book"></a>--}}

                    {{--<a href="{{route((($room->user->status=='active')?'rooms.deactivate':'rooms.activate'),$room->id)}}"> <span class="label label-primary">{{($room ->user->status=='active')?'Deactive':'Active'}}</span></a>--}}
                    {{--<a href="#"> <span class="label label-danger">Delete</span></a>--}}

                </td>
            </tr>
        @empty
            <tr>
                <td>Sorry no tours have been created please add one</td>

            </tr>
        @endforelse
        </tbody>
    </table>
</div>