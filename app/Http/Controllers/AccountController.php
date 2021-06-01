<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
   
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
       
        return response()->json($account,200);  
    }

   


    public function activeAccount(Account $account)
    {
        $account['active']=1;
        $account->save();
        return response()->json(['msg'=>'active account', 'account'=>$account]);
    }

    public function deactiveAccount(Account $account)
    {
        $account['active']=0;
        $account->save();
        return response()->json(['msg'=>'Not active account', 'account'=>$account]);
    }
}
