<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DateBetween implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    protected $pickupDate;

    protected function isWeekEnd($pickupDate)
    {
        return $pickupDate->dayOfWeek == 0 || $pickupDate->dayOfWeek == 6;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pickupDate = Carbon::parse($value);
        $lastDate = Carbon::now()->addWeek();

        $this->pickupDate = $pickupDate;

        return !$this->isWeekEnd($pickupDate) && $pickupDate >= now() && $pickupDate <= $lastDate;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        $lastDate = Carbon::now()->addWeek();
        if ($this->isWeekEnd($this->pickupDate)) {
            return redirect()->back()->with('error', 'Nous ne travaillons pas le weekend.');
        } else if (!($this->pickupDate >= now() && $this->pickupDate <= $lastDate)) {
            return 'Choisissez une date à partir de maintenant et au plus tard dans une semaine.';
        }

        // dd($this->errorType);
    }
}
