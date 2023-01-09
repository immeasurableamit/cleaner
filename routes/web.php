<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\State;
use App\Models\User;
use App\Models\UserDetails;
use App\Http\Livewire\Customer;
use App\Http\Livewire\CustomerUpdate;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Cleaner;
use App\Http\Controllers\Cleaner\CleanerController;
use App\Http\Controllers\Customer as CustomerControllers;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Customer\AppointmentController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Customer\FavouriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('index');

//Route::get('/searchresult', [HomeController::class, 'searchResultParameters'])->name('home.search-result-parameters');



//flush cache
Route::get('/cache-clear', function() {
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});

Route::get('signup', function () {
    $title = array(
        'active' => 'signup',
    );
    return view('home.signup', compact('title'));
})->name('signup');

Route::get('signup-customers', function () {
    $title = array(
        'active' => 'signup-customers',
    );
    $states = State::all();
    return view('auth.register-customer', compact('title', 'states'));
})->name('signup-customers');

Route::get('signup-cleaner', function () {
    $title = array(
        'active' => 'signup-cleaner',
    );
    $states = State::all();
    return view('auth.register-cleaner', compact('title', 'states'));
})->name('signup-cleaner');

Route::get('help', function () {
    $title = array(
        'active' => 'help',
    );
    return view('home.help-center', compact('title'));
})->name('help-center');

Route::get('/search-result', [HomeController::class, 'searchResultParameters'])->name('search-result');
/*
Route::get('search-result', function () {
    $title = array(
        'active' => 'search-result',
    );
    return view('home.search-result', compact('title'));
})->name('search-result');
*/

Route::get('profile/{id}', function () {
    $title = array(
        'active' => 'profile',
    );
    return view('home.profile', compact('title'));
})->name('profile');

Route::get('terms-and-conditions', function () {
    $title = array(
        'active' => 'terms-and-conditions',
    );
    return view('home.terms-and-conditions', compact('title'));
})->name('terms-and-conditions');

Route::get('/checkout/{details}', [HomeController::class, 'checkout'])->name('checkout');

Route::middleware(['auth', 'verified', 'trackLastActiveAt'])->group(function () {

    Route::controller(ChatController::class)->group(function () {
        Route::get('/messages', 'index')->name('messages');
        //Route::get('/chat/{id}', 'show')->name('chat.show');
        Route::post('/chat/users', 'fetchUsers');
        Route::post('/chat/messages', 'fetchMessages');
        Route::post('/chat/messages/send', 'sendMessage');
        Route::post('/files-upload', 'fileUpload');
    });


    // admin routes
    Route::prefix('admin')->group(function () {

        Route::get('/customer', function () {
            $title = array(
                'active' => 'customer',
            );
            return view('admin.customer.customer');
        })->name('admin.customer');

        //Admin Customer
        Route::get('/customer/{id}', function () {
            $title = array(
                'active' => 'customer-edit',
            );

            return view('admin.customer.customer-edit', ["id" => request()->id]);
        })->name('admin.customer.show');

        //Admin cleaner
        Route::get('/cleaner', function () {
            $title = array(
                'active' => 'cleaner',
            );
            return view('admin.cleaner.cleaner');
        })->name('admin.cleaner');

        //Admin Cleaner Update
        Route::get('/cleaner/{id}', function () {
            $title = array(
                'active' => 'admin-account',
            );
            return view('admin.cleaner.cleaner-edit', ["id" => request()->id]);
        })->name('admin.cleaner.show');

        //Admin Support
        Route::get('/support', function () {
            $title = array(
                'active' => 'admin-support',
            );
            return view('admin.support.support');
        })->name('admin.support');

        // Team Section
        Route::get('/cleaner/team/{id}', [AdminController::class, 'teamView'])->name('admin.cleaner.team');



        //services
        Route::prefix('services')->group(function () {
            Route::get('/', function () {
                $title = array(
                    'title' => 'Services',
                    'active' => 'services',
                );
                return view('admin.services.index', compact('title'));
            })->name('admin.services.index');
        });
    });
});

Route::middleware(['auth', 'verified'])->group(function () {

    // customer routes
    Route::prefix('customer')->group(function () {

        Route::get('/account', function () {
            $title = array(
                'title' => 'Account',
                'active' => 'account',
            );
            return view('customer.account.account', compact('title'));
        })->name('customer.account');

        Route::prefix('billing')->group(function () {
            Route::controller(CustomerControllers\BillingController::class)->group(function () {
                Route::get('/', 'index')->name('customer.billing.index');
                Route::get('/edit', 'edit')->name('customer.billing.edit');
                Route::post('/update', 'update')->name('customer.billing.update');

                /*
                Route::get('/stripe/connect', 'connectStripe')->name("cleaner.billing.stripeConnect");
                Route::get('/banking-info-error', 'bankingInfoError')->name('cleaner.billing.error');
                Route::get('/banking-info-success', 'bankingInfoSuccess')->name('cleaner.billing.success');

                Route::get('/accountdetails', 'bankAccount')->name('cleaner.billing.editBankAccount');
                Route::get('/editpayment', 'editpayment')->name('cleaner.billing.editPaymentMethod');
                Route::post('/profile/bankInfoStore', 'bankingInfoStore')->name('cleaner.billing.bankInfoStore');
                Route::get('/profile/connect-account', 'connectAccount')->name('cleaner.billing.connectAccount'); */
            });
        });

        // customer appointments
        Route::prefix('appointments')->group(function () {
            Route::controller(AppointmentController::class)->group(function () {
                Route::get('/', 'index')->name('customer.appointment.index');
                Route::get('/reschedule-appointment/{id}', 'rescheduleAppointment')->name('customer.appointment.rescheduleAppointment');
                Route::get('/updateschedule-appointment', 'updateScheduleAppointment')->name('customer.appointment.updateScheduleAppointment');
                Route::post('/slotAvailable', 'slotAvailable')->name('customer.appointment.slotAvailable');
            });
        });

        //customer Favourite

        Route::prefix('favourite')->group(function () {
            Route::controller(FavouriteController::class)->group(function () {
                Route::get('/', 'index')->name('customer.favourite.index');
                Route::delete('/delete/{id}', 'deleteFavouriteCleaner')->name('customer.favourite.deleteFavouriteCleaner');
            });
        });
    });

    //cleaner routes
    Route::prefix('cleaner')->group(function () {

        Route::get('/set-location', [CleanerController::class, 'showSetLocationPage'])->name('cleaner.set-location-page');
        Route::post('/set-location', [CleanerController::class, 'setLocation'])->name('cleaner.set-location');

        Route::get('/insurance', [CleanerController::class, 'showInsurancePage'])->name('cleaner.insurance');
        Route::get('/insurance-provider', [CleanerController::class, 'redirectToInsuranceProvider'])->name('cleaner.insurance-provider');
        Route::get('/toggle-organic-service', [CleanerController::class, 'toggleOrganicService'])->name('cleaner.toggle-organic-service');

        Route::get('/account', function () {
            $title = array(
                'title' => 'Account',
                'active' => 'account',
            );
            return view('cleaner.account.account', compact('title'));
        })->name('cleaner.account');

        Route::get('/team', function () {
            $title = array(
                'title' => 'Team',
                'active' => 'team',
            );
            return view('cleaner.team.team', compact('title'));
        })->name('cleaner.team');

        Route::controller(CleanerController::class)->group(function () {

            Route::get('/reviews', 'reviews')->name('cleaner.reviews');
            /*
            Route::get('/reviews', function () {
                $title = array(
                    'title' => 'Reviews',
                    'active' => 'reviews',
                );
                return view('cleaner.reviews.reviews', compact('title'));
            })->name('cleaner.reviews');
            */
        });
        //availability
        Route::prefix('availability')->group(function () {
            Route::controller(Cleaner\AvailabilityController::class)->group(function () {
                Route::get('/', 'index')->name('cleaner.availability.index');
                Route::post('/jobs', 'jobs')->name('cleaner.availability.jobs');
                Route::post('/buffer', 'buffer')->name('cleaner.availability.buffer');
                Route::post('/time', 'time')->name('cleaner.availability.time');
            });
        });
        //billing
        Route::prefix('billing')->group(function () {
            Route::controller(Cleaner\billing\BillingController::class)->group(function () {
                Route::get('/', 'index')->name('cleaner.billing.billing');
                Route::get('/stripe/connect', 'connectStripe')->name("cleaner.billing.stripeConnect");
                Route::get('/banking-info-error', 'bankingInfoError')->name('cleaner.billing.error');
                Route::get('/banking-info-success', 'bankingInfoSuccess')->name('cleaner.billing.success');

                Route::get('/accountdetails', 'bankAccount')->name('cleaner.billing.editBankAccount');
                Route::get('/editpayment', 'editpayment')->name('cleaner.billing.editPaymentMethod');
                Route::post('/profile/bankInfoStore', 'bankingInfoStore')->name('cleaner.billing.bankInfoStore');
                Route::get('/profile/connect-account', 'connectAccount')->name('cleaner.billing.connectAccount');
            });
        });


        //services
        Route::prefix('services')->group(function () {
            Route::controller(Cleaner\ServicesController::class)->group(function () {
                Route::get('/', 'index')->name('cleaner.services.index');
                Route::post('/store', 'store')->name('cleaner.services.post');
            });
        });


        //Support
        Route::get('/support', function () {
            $title = array(
                'title' => 'Support',
                'active' => 'support',
            );
            return view('cleaner.support.support', compact('title'));
        })->name('cleaner.support.service');

        Route::get('testemail', function () {
            Mail::to(['greatjob@yopmail.com'])->send(new ContactMail);
        });


        // Notification
        Route::prefix('notification')->group(function () {
            Route::controller(Cleaner\notification\NotificationController::class)->group(function () {
                Route::get('/', 'index')->name('cleaner.notification.index');
            });
        });

        //jobs
        Route::prefix('jobs')->group(function () {
            Route::controller(Cleaner\jobs\JobsController::class)->group(function () {
                Route::get('/', 'index')->name('cleaner.jobs.jobs');
            });
        });
    });
});
