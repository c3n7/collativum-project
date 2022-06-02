@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }}
  class='appeareance-none border py-1 px-1 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm file:mr-4 file:py-2 file:px-2 file:rounded-lg file:border-0 file:font-semibold file:bg-gray-800 file:bg-opacity-80 file:text-white hover:file:bg-gray-800 active:file:scale-95 file:transition-all file:ease-out file:text-xs h-fit w-full mt-1'
  {!! $attributes !!}>
