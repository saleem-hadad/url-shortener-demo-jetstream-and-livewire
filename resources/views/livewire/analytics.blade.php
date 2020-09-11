<div class="flex flex-col mt-6" wire:poll>
  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
      <div class="shadow overflow-hidden border-b border-gray-200 bg-white sm:rounded-lg">
        @if($links->count())
            <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Original URL
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Short version
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Views
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($links as $link)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ substr($link->original, 0, 50) }}@if(strlen($link->original) > 50)...@endif
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            <a href="{{ route('links.show', ['link' => $link->shortened]) }}" target="__blank" class="px-2 inline-flex leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                {{ route('links.show', ['link' => $link->shortened]) }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap">
                            {{ number_format($link->views) }}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                            <button wire:click="deleteLink({{ $link->id }})" class="text-red-500">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        @else
            <p class="text-center p-4">No links found..</p>
        @endif
      </div>
    </div>
  </div>
</div>
