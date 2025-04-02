<x-layout.admin>
    <div class="mt-4">
        @if ($params == 'new-order')
            <x-dashboard.newOrder></x-dashboard.newOrder>
        @elseif ($params == 'order-complated')
            <h1>process</h1>
        @else
            <x-dashboard.table></x-dashboard.table>
        @endif
    </div>
</x-layout.admin>
