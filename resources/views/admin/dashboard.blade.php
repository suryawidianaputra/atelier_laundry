{{-- @dd($paramsEnd) --}}

<x-layout.admin>
    <div class="mt-4">
        @if ($params == 'new-order' && empty($paramsEnd))
            <x-dashboard.newOrder></x-dashboard.newOrder>
        @elseif ($params == 'order-complated' && empty($paramsEnd))
            <x-dashboard.complated-order></x-dashboard.complated-order>
        @elseif (!empty($params) && $paramsEnd == 'detail-order')
            <x-dashboard.detail-order :orderData="$orderData"></x-dashboard.detail-order>
            {{-- @dd($orderData->id) --}}
        @else
            <x-dashboard.table></x-dashboard.table>
        @endif
    </div>
</x-layout.admin>
