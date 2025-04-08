{{-- @dd($paramsEnd) --}}

<x-layout.admin>
    <div class="mt-4">
        @if ($params == 'new-order' && empty($paramsEnd))
            <x-dashboard.newOrder></x-dashboard.newOrder>
        @elseif ($params == 'order-complated' && empty($paramsEnd))
            <x-dashboard.complated-order></x-dashboard.complated-order>
        @elseif ($params == 'packages' && empty($paramsEnd))
            <x-dashboard.packages></x-dashboard.packages>
        @elseif ($params == 'new-package' && empty($paramsEnd))
            <x-dashboard.new-package></x-dashboard.new-package>
        @elseif (!empty($params) && $paramsEnd == 'detail-order')
            <x-dashboard.detail-order :orderData="$orderData"></x-dashboard.detail-order>
        @elseif (!empty($params) && $paramsEnd == 'detail-package')
            <x-dashboard.package-detail :package="$params"></x-dashboard.package-detail>
        @else
            <x-dashboard.table></x-dashboard.table>
        @endif
    </div>
</x-layout.admin>
