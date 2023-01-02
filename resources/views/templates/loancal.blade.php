<form x-data="loan" id="loancal" enctype='multipart/form-data'
    class="mx-auto w-full mt-12 rounded border bg-gray-300 p-2" x-on:submit.prevent="handleOnSubmit">
    <h1 class="text-center uppercase mb-2 border-b-2 py-2 bg-gray-100 border-site-color">Payment calculator</h1>
    
    <div class="p-2 rounded text-gray-100 bg-site-color">
        <p class="flex justify-between"><span>Monthly Payment:</span> <span x-text="'&#8358;'+monthly_payment"></span></p>
        <p class="flex justify-between"><span>Total Interest Payment:</span> <span x-text="'&#8358;'+total_interest_payment"></span></p>
        <p class="flex justify-between"><span>Total Amount to Pay: </span> <span x-text="'&#8358;'+total_amount_to_pay"></span></p>
    </div>
    
    <div class="w-full rounded">
        <x-input-label for="vehicle_price" x-bind:input.debounce="calculatePayment" 
        class="uppercase" :value="__('Car price')" />

        <x-text-input id="vehicle_price" class="block w-full py-1" type="text" 
            x-model="vehicle_price" required />
    </div>

    <div class="w-full rounded">
        <x-input-label for="down_payment" x-bind:input.debounce="calculatePayment" class="uppercase" :value="__('Down payment')" />

        <x-text-input id="down_payment" class="block w-full py-1" type="text" 
            x-model="down_payment" required />
    </div>

    <div class="w-full rounded">
        <x-input-label for="interest_rate" x-bind:input.debounce="calculatePayment" class="uppercase" :value="__('Interest rate')" />

        <x-text-input id="interest_rate" class="block w-full py-1" type="text" 
            x-model="interest_rate" required />
    </div>

    <div class="w-full rounded">
        <x-input-label for="period_month" x-bind:input.debounce="calculatePayment" class="uppercase" :value="__('Years')" />

        <x-text-input id="period_month" class="block w-full py-1" type="text" 
            x-model="period_month" required />
    </div>
       
    <button class="bg-site-color w-full py-2 mt-3 rounded text-white hover:bg-green-900">
        Apply loan
    </button>
</form>