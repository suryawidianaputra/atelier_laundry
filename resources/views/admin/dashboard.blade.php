{{-- @dd($paramsEnd) --}}

<x-layout.admin>
    <div class="mt-4">
        @if ($params == 'new-order' && empty($paramsEnd))
            <x-dashboard.newOrder></x-dashboard.newOrder>
        @elseif ($params == 'order-complated' && empty($paramsEnd))
            <h1>process</h1>
        @elseif (!empty($params) && $paramsEnd == 'detail-order')
            <x-dashboard.detail_order :orderId="$params"></x-dashboard.detail_order>
        @else
            <x-dashboard.table></x-dashboard.table>
        @endif
    </div>
</x-layout.admin>
