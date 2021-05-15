<?php

namespace App\Http\Controllers;

use App\Charts\SampleChart;
use App\CommonFunctions;
use App\Models\Orders;
use Chartisan\PHP\ChartData;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();

        $reference = $database->getReference();
        $userCount = $reference->getChild('Users')->getSnapshot()->numChildren();
        $orderCount = $reference->getChild('Orders')->getSnapshot()->numChildren();
        $serviceCount = $reference->getChild('Services')->getSnapshot()->numChildren();
        $invoices = $reference->getChild('Invoices')->getSnapshot()->numChildren();
        $coupons = $reference->getChild('Coupons')->getSnapshot()->numChildren();
        $serviceMen = $reference->getChild('Servicemen')->getSnapshot()->numChildren();
        $vendors = $reference->getChild('Vendors')->getSnapshot()->numChildren();

        $ordersFromFirebase = $reference->getChild('Orders')->getValue();

        $dbOrders = DB::table("orders")->get();
        $orderArray = array();


        foreach ($dbOrders as $ord) {
            array_push($orderArray, $ord->order_id);

        }
        $totalRevenue = 0;
        if (isset($ordersFromFirebase)) {


            foreach ($ordersFromFirebase as $orderFromFirebase) {
                $totalRevenue = $totalRevenue + $orderFromFirebase['totalPrice'];
                if (!in_array($orderFromFirebase['orderId'], $orderArray)) {

                    $order = new Orders();
                    $order->order_id = $orderFromFirebase['orderId'];
                    $order->service_name = $orderFromFirebase['serviceName'];
                    $order->city = 'Lahore';
                    $order->username = $orderFromFirebase['user']['username'];
                    $order->year = substr($orderFromFirebase['orderId'], 0, 4);
                    $order->month = substr($orderFromFirebase['orderId'], 4, 2);
                    $order->day = substr($orderFromFirebase['orderId'], 6, 2);
                    $order->save();

                }
            }
        }


        return view('dashboard')
            ->with('userCount', $userCount)
            ->with('orderCount', $orderCount)
            ->with('serviceMen', $serviceMen)
            ->with('serviceCount', $serviceCount)
            ->with('coupons', $coupons)
            ->with('vendors', $vendors)
            ->with('totalRevenue', $totalRevenue)
            ->with('invoices', $invoices);

    }

    public function getOrders()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Orders');

        $orders = $reference->getValue();
        usort($orders, function ($a, $b) { //Sort the array using a user defined function
            return $a['time'] > $b['time'] ? -1 : 1; //Compare the scores
        });


        return view('orders')->with('orders', $orders);


    }

    public function getCustomers()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Users');

        $customers = $reference->getValue();

        return view('customers')->with('customers', $customers);

    }

    public function getServicemen()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Servicemen');

        $servicemen = $reference->getValue();

        return view('servicemen')->with('servicemen', $servicemen);

    }

    public function getVendors()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Vendors');

        $vendors = $reference->getValue();

        return view('vendors')->with('vendors', $vendors);

    }

    public function invoices()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Invoices');

        $invoices = $reference->getValue();
//        return $invoices;

        return view('invoices')->with('invoices', $invoices);

    }

    public function viewinvoice($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Invoices/' . $id);

        $invoice = $reference->getValue();
//        return $invoices;

        return view('invoice')->with('invoice', $invoice);

    }

    public function vieworder($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Orders/' . $id);
        $pictures = $database->getReference('OrderPictures/' . $id)->getValue();

        $order = $reference->getValue();

        return view('vieworder')
            ->with('order', $order)
            ->with('pictures', $pictures);


    }

    public function viewvendor($id)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $vendor = $database->getReference('Vendors/' . $id)->getValue();

        $orderz = $database->getReference('Orders/')->getValue();

        $orders = array();
        foreach ($orderz as $key => $value) {
            if (isset($value['vendor'])) {


                if ($value['vendor'] == $vendor['username']) {
                    array_push($orders, $value);
                }
            }

        }

        return view('viewvendor')
            ->with('vendor', $vendor)
            ->with('orders', $orders)
            ->with('id', $id);


    }

    public function addvendor()
    {


        return view('addvendor');


    }

    public function viewcustomer($id)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Users/' . $id);
        $customer = $reference->getValue();

        $orders = array();
        foreach ($customer['Orders'] as $key => $value) {
            $ord = $database->getReference('Orders/' . $key)->getValue();
            if (isset($ord['orderId'])) {
                array_push($orders, $ord);
            }

        }


        return view('viewcustomer')
            ->with('customer', $customer)
            ->with('orders', $orders)
            ->with('id', $id);


    }

    public function cities()
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $reference = $database->getReference('Cities/');
        $cities = $reference->getValue();

        return view('cities')
            ->with('cities', $cities);


    }

    public function savevendor(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();

        $updates = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'cnic' => $request->cnic,
            'officePhone' => $request->officePhone,
            'officeAddress' => $request->officeAddress,
            'homeAddress' => $request->homeAddress,

        ];

        $database->getReference('Vendors/' . $request->username)// this is the root reference
        ->update($updates);
        return redirect()->route('vendors');

    }

    public function savenewvendor(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();

        $updates = [
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'active' => true,
            'approved' => true,
            'password' => $request->password,
            'picUrl' => " ",
            'fcmKey' => " ",
            'city' => $request->city,
            'commission' => $request->commission,
            'cnic' => $request->cnic,
            'officePhone' => $request->officePhone,
            'officeAddress' => $request->officeAddress,
            'homeAddress' => $request->homeAddress,

        ];

        $database->getReference('Vendors/' . $request->username)// this is the root reference
        ->update($updates);
        return redirect()->route('vendors');

    }

    public function savecommision(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();

        $updates = [
            'commission' => $request->commission

        ];

        $database->getReference('Vendors/' . $request->username)// this is the root reference
        ->update($updates);
        return Redirect::back()->with('message', 'Operation Successful !');


    }

    public function addservice()
    {
        return view('addservice');
    }

    public function saveservice(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $milliseconds = round(microtime(true) * 1000);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
//            $settings->logo = $file->getClientOriginalName();
            $file->move('uploads', $milliseconds . '.png');
        }
        $oferingCOmmercial = false;
        $oferingResidential = false;
        $offeringVillaService = false;
        if (isset($request->offeringCommercialService)) {
            // checked
            $oferingCOmmercial = true;
        }
        if (isset($request->offeringResidentialService)) {
            // checked
            $oferingResidential = true;
        }
        if (isset($request->offeringVillaService)) {
            // checked
            $offeringVillaService = true;
        }
        $updates = [
            'active' => true,
            'commercialServicePeakPrice' => (int)$request->commercialServicePeakPrice,
            'commercialServicePrice' => (int)$request->commercialServicePrice,
            'description' => $request->description,
            'name' => $request->name,
            'city' => $request->city,
            'id' => $request->name,
            'imageUrl' => $milliseconds . '.png',
            'offeringCommercialService' => $oferingCOmmercial,
            'offeringResidentialService' => $oferingResidential,
            'offeringVillaService' => $offeringVillaService,
            'peakPrice' => (int)$request->peakPrice,
            'position' => (int)$request->position,
            'serviceBasePrice' => (int)$request->serviceBasePrice,

        ];

        $database->getReference('Services/' . $request->city . '/' . $request->name)// this is the root reference
        ->update($updates);
        return redirect()->route('serviceslist');


    }

    public function editservice(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $milliseconds = round(microtime(true) * 1000);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
//            $settings->logo = $file->getClientOriginalName();
            $file->move('uploads', $milliseconds . '.png');
        }
        $oferingCOmmercial = false;
        $oferingResidential = false;
        if (isset($request->offeringCommercialService)) {
            // checked
            $oferingCOmmercial = true;
        }
        if (isset($request->offeringResidentialService)) {
            // checked
            $oferingResidential = true;
        }
        $updates = [
            'active' => true,
            'commercialServicePeakPrice' => (int)$request->commercialServicePeakPrice,
            'commercialServicePrice' => (int)$request->commercialServicePrice,
            'description' => $request->description,
            'name' => $request->name,
            'city' => $request->city,
            'id' => $request->name,
            'imageUrl' => $milliseconds . '.png',
            'offeringCommercialService' => $oferingCOmmercial,
            'offeringResidentialService' => $oferingResidential,
            'peakPrice' => (int)$request->peakPrice,
            'position' => (int)$request->position,
            'serviceBasePrice' => (int)$request->serviceBasePrice,

        ];

        $database->getReference('Services/' . $request->city . '/' . $request->name)// this is the root reference
        ->update($updates);
        return redirect()->route('cities');


    }

    public function addcity(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();


        $database->getReference('Cities/' . $request->cityname)->set($request->cityname);// this is the root reference

        return redirect()->route('cities');


    }

    public function addsubservice(Request $request)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();

        $updates = [
            'active' => true,
            'id' => $request->name,
            'name' => $request->name,
            'max' => 10,
            'min' => 0,
            'measureUnit' => '',
            'timeHour' => (int)0,
            'timeMin' => (int)30,
            'parentService' => $request->parentService,

        ];


        $database->getReference('SubServices/' . $request->city . '/' . $request->name)->set($updates);// this is the root reference

        return Redirect::back()->with('message', 'Operation Successful !');


    }

    public function deletecity($id)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();


        $database->getReference('Cities/' . $id)->remove();// this is the root reference

        return redirect()->route('cities');


    }

    public function serviceslist()
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();


        $reference = $database->getReference('Services/');// this is the root reference

        $services = $reference->getValue();

        return view('serviceslist')
            ->with('services', $services);


    }

    public function viewservice($id)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $id = explode("-", $id);
        $service_name = $id[0];


        $service = $database->getReference('Services/' . $service_name)->getValue();// this is the root reference
        $subserviceslist = $database->getReference('SubServices/')->getValue();// this is the root reference

        return view('editservice')
            ->with('service', $service)
            ->with('subserviceslist', $subserviceslist);


    }

    public function deleteservice($id)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $id = explode("-", $id);
        $service_name = $id[0];
        $city = $id[1];
        $database->getReference('ServicesList/' . $city . '/' . $service_name)->remove();// this is the root reference

        return redirect()->route('cities');


    }

    public function deletesubservice($id)
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();
        $id = explode("-", $id);
        $service_name = $id[0];
        $database->getReference('SubServices/' . $service_name)->remove();// this is the root reference

        return Redirect::back()->with('message', 'Operation Successful !');


    }

    public function settings()
    {


        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();


        return view('settings');


    }

    public function changeVendorStatus($id, $value)
    {
        $factory = (new Factory)->withServiceAccount(__DIR__ . '/Firebase.json');
        $database = $factory->createDatabase();

        if ($value == 'inactive') {
            $val = false;
            $key = 'active';
        } else if ($value == 'active') {
            $val = true;
            $key = 'active';
        } else if ($value == 'disapprove') {
            $val = true;
            $key = 'approved';
        } else if ($value == 'approve') {
            $val = true;
            $key = 'approved';
        }
        $updates = [
            $key => $val
        ];
        $database->getReference('Vendors/' . $id)// this is the root reference
        ->update($updates);

        return redirect()->route('vendors');


    }
}