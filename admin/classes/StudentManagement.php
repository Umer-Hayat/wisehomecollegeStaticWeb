<?php
$filepath=realpath(dirname(__FILE__)); 
include_once ($filepath.'/session.php');
include_once ($filepath.'/database.php');
include_once ($filepath.'/format.php');
class StudentManagement
{   private $db;
    private $fm;
	function __construct()
	{
		$this->db=new Database();
		$this->fm=new Format();
	}

    public function register($name,$fname,$cnic,$batch_id,$exp_date,$dob,$fee,$course,$start_date,$contact,$address,$qualif,$id_pic)
    {
        $name=$this->fm->validation($name);
        $fname=$this->fm->validation($fname);
        $cnic=$this->fm->validation($cnic);
        $batch_id=$this->fm->validation($batch_id);
        $exp_date=$this->fm->validation($exp_date);
        $dob=$this->fm->validation($dob);
        $fee=$this->fm->validation($fee);
        $course=$this->fm->validation($course);
        $start_date=$this->fm->validation($start_date);
        $contact=$this->fm->validation($contact);
        $address=$this->fm->validation($address);
        $qualif=$this->fm->validation($qualif);
        $id_pic=$this->fm->validation($id_pic);

        $query1="select * from students where cnic='$cnic'";
        $result1=$this->db->select($query1);
        if($result1)
        {
            $msg = "Data Not Insert CNIC Already Exist...";
            return $msg;
        }else
        {
            $query = "INSERT INTO students(name,fname,cnic,batch_id,exp_date,dob,fee,fee_status,course,start_date,contact,address,qualif,id_pic,status) VALUES('$name','$fname','$cnic','$batch_id','$exp_date','$dob','$fee','unpaid','$course','$start_date','$contact','$address','$qualif','$id_pic','1')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
        }
    }

    public function uploadSlideImage($name)
    {
        $name=$this->fm->validation($name);

        $query = "INSERT INTO slider(slide_image) VALUES('$name')";
        $result = $this->db->insert($query);
        if ($result) {
            $msg = "Image Uploaded";
            return $msg;
        } else {
            $msg = "Image Not Uploaded";
            return $msg;
        }

    }


    public function deleteSlide($id)
    {
        $id=$this->fm->validation($id);

        $query = "SELECT * FROM slider WHERE id=$id";
        $result=$this->db->select($query);
        $data=$result->fetch_assoc();
        $image = $data['slide_image'];

        if ($image) {
            unlink('./'.$image);
        

        $query="delete from slider where id='$id'";
        $result=$this->db->delete($query);
        return $result;
        }
    }

    public function updatestudent($name,$fname,$cnic,$exp_date,$batch_id,$dob,$fee,$course,$start_date,$contact,$address,$qualif,$id_pic,$id){

        $name=$this->fm->validation($name);
        $fname=$this->fm->validation($fname);
        $cnic=$this->fm->validation($cnic);
        $batch_id=$this->fm->validation($batch_id);
        $exp_date=$this->fm->validation($exp_date);
        $dob=$this->fm->validation($dob);
        $fee=$this->fm->validation($fee);
        $course=$this->fm->validation($course);
        $start_date=$this->fm->validation($start_date);
        $contact=$this->fm->validation($contact);
        $address=$this->fm->validation($address);
        $qualif=$this->fm->validation($qualif);
        $id_pic=$this->fm->validation($id_pic);
        $id=$this->fm->validation($id);

        $query = "update students set name='$name',fname='$fname',cnic='$cnic',exp_date='$exp_date',batch_id='$batch_id',dob='$dob',fee='$fee',course='$course',start_date='$start_date',contact='$contact',address='$address',qualif='$qualif',id_pic='$id_pic' where id='$id'";
        $result = $this->db->update($query);
        if ($result) {
                $msg = "Data Updated";
                return $msg;
            } else {
                $msg = "Data Not Updated";
                return $msg;
            }
    }


    public function getAllRecords($table)
    {
        $query="select * from $table";
        $result=$this->db->select($query);
        return $result;
    }
    public function getAllRecordsByStatus($batch_id, $status)
    {
        $query="select * from students where batch_id='$batch_id' and status='$status'";
        $result=$this->db->select($query);
        return $result;
    }

    public function getAllRecord($id,$table)
    {
        $query="select * from $table where id='$id'";
        $result=$this->db->select($query);
        return $result;
    }
    
    public function getAllRecordFeeById($id,$table)
    {
        $query="select * from $table where student_id='$id' ORDER BY id DESC";
        $result=$this->db->select($query);
        return $result;
    }

    public function getAllStudentsByStatus($table,$status)
    {
        $query="select * from $table where status='$status'";
        $result=$this->db->select($query);
        return $result;
    }

    public function getAllRecordByQuery($query)
    {
        $query="$query";
        $result=$this->db->select($query);
        return $result;
    }



    public function deleteitem($id,$table)
    {
        $id=$this->fm->validation($id);

        $query="delete from $table where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }


    public function deleteStudent($id)
    {
        $id=$this->fm->validation($id);

        $query="delete from students where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }
    public function terminateStudent($id)
    {
        $id=$this->fm->validation($id);
        $date = date("y-m-d");


        $query="UPDATE students SET status='0',end_date='$date' WHERE id='$id'";
        $result=$this->db->update($query);
        if ($result) {
            $msg = "Data Updated";
            return $msg;
        } else {
            $msg = "Data Not Updated";
            return $msg;
        }
    }

    public function updatehomedata($dir_msg,$vision,$goals,$mission,$achieve,$about,$phone1,$phone2,$email)
    {
        $dir_msg=$this->fm->validation($dir_msg);
        $vision=$this->fm->validation($vision);
        $goals=$this->fm->validation($goals);
        $mission=$this->fm->validation($mission);
        $achieve=$this->fm->validation($achieve);
        $about=$this->fm->validation($about);
        $phone1=$this->fm->validation($phone1);
        $phone2=$this->fm->validation($phone2);
        $email=$this->fm->validation($email);

        $query="UPDATE homepagedata SET dir_msg='$dir_msg', vision='$vision',goals='$goals', mission='$mission',achieve='$achieve', about='$about',phone1='$phone1', phone2='$phone2',email='$email'";
        $result=$this->db->update($query);
        if ($result) {
            $msg = "Data Updated";
            return $msg;
        } else {
            $msg = "Data Not Updated";
            return $msg;
        }
    }
    public function updateFeeStatus($id)
    {
        $id=$this->fm->validation($id);

        // $d=strtotime("-1 Month");
        // $date = date("y-m-d");
        // $query1="select * from fee where student_id='$id' and date='$date'";
        // $result1=$this->db->select($query1);
        // if ($result1) {
            $query="UPDATE students SET fee_status='unpaid' WHERE id='$id'";
            $result2=$this->db->update($query);
        // }
        
    }

    public function getAllRecordofFees(){

        $date = date("y-m-d", strtotime("-1 Month"));
        $date2 = date("y-m-d", strtotime("-2 Months"));
        $prev_day = date('Y-m-d', strtotime('-1 Month -1 day'));
        $prev_day2 = date('Y-m-d', strtotime('-1 Month -2 day'));

        $weekDay = date('w', strtotime($prev_day));
        $weekDay2 = date('w', strtotime($prev_day2));
        if($weekDay == 0 || $weekDay == 6 || $weekDay2 == 0 || $weekDay2 == 6)
        {
            $query="select * from students where start_date='$date' or start_date='$prev_day' or start_date='$prev_day2' or start_date='$date2' and status='1'";
            $result=$this->db->select($query);
            if($result){
                return $result;
            }
        }
        else{
            $query="select * from students where start_date='$date' or start_date='$date2'";
            $result=$this->db->select($query);
            if($result){
                return $result;
            }
        }
    }

    public function refundFee($id,$amount)
    {
        $id=$this->fm->validation($id);
        $amount=$this->fm->validation($amount);

        $query="select * from fee where student_id='$id' ORDER BY id DESC";
        $result=$this->db->select($query);
        if ($result) {
            $data=$result->fetch_assoc();

            $fee_id = $data['id'];
            $fee_amount = $data['amount'];
            if ($fee_amount>0) {
                if ($amount ==$fee_amount) {
                    $query1="UPDATE fee SET amount='0',refund_amount='$amount' WHERE id='$fee_id'";
                    $result1=$this->db->update($query1);

                    $query2="UPDATE students SET fee_status='refunded' WHERE id='$id'";
                    $result2=$this->db->update($query2);

                    if ($result2) {
                        $msg = "Data Updated";
                        return $msg;
                    }else{
                        $msg = "Data Not Updated";
                        return $msg;
                    }
                }elseif($amount < $fee_amount){
                    $b_amount = $fee_amount - $amount;
                    $query1="UPDATE fee SET amount='$b_amount',refund_amount='$amount' WHERE id='$fee_id'";
                    $result1=$this->db->update($query1);

                    $query2="UPDATE students SET fee_status='refunded' WHERE id='$id'";
                    $result2=$this->db->update($query2);

                    if ($result2) {
                        $msg = "Data Updated";
                        return $msg;
                    }else{
                        $msg = "Data Not Updated";
                        return $msg;
                    }
                }
                else{
                    $msg = "The amount is greater then Student Fee";
                    return $msg;
                }
                
            }else{
                $msg = "Student already Refunded";
                return $msg;
            }
            

        }else{
            $msg = "Student did not Pay any fee Before";
            return $msg;
        }
        
    }
    

    public function addBatch($name,$start_date)
    {
        $name=$this->fm->validation($name);
        $start_date=$this->fm->validation($start_date);

        $query = "INSERT INTO batch(batch_name,batch_start,status) VALUES('$name','$start_date','1')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }
    public function updatebatch($name,$batch_start,$id)
    {
        $name=$this->fm->validation($name);
        $batch_start=$this->fm->validation($batch_start);
        $id=$this->fm->validation($id);

        $query="UPDATE batch SET batch_name='$name', batch_start='$batch_start' WHERE id='$id'";
        $result=$this->db->update($query);
        if ($result) {
            $msg = "Data Updated";
            return $msg;
        } else {
            $msg = "Data Not Updated";
            return $msg;
        }
    }
    public function endBatch($id)
    {
        $id=$this->fm->validation($id);
        $date = date("y-m-d");

        $query="UPDATE batch SET batch_end='$date', status='0' WHERE id='$id'";
        $result=$this->db->update($query);
        if ($result) {
            $msg = "Data Updated";
            return $msg;
        } else {
            $msg = "Data Not Updated";
            return $msg;
        }
    }

    public function deleteBatch($id)
    {
        $id=$this->fm->validation($id);

        $query="delete from batch where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }
    public function getBatchByStatus($status)
    {
        $status=$this->fm->validation($status);


        $query="select * from batch where status='$status'";
        $result=$this->db->select($query);
        return $result;
    }

    public function selectBatch($batch_id,$Paymenttype)
    {
        $batch_id=$this->fm->validation($batch_id);
        $Paymenttype=$this->fm->validation($Paymenttype);


        $query="select * from students where batch_id='$batch_id' and fee_status='$Paymenttype'";
        $result=$this->db->select($query);
        return $result;
    }

    public function payFee($id,$batch_id,$installment,$amount,$rno)
    {
        $id=$this->fm->validation($id);
        $batch_id=$this->fm->validation($batch_id);
        $installment=$this->fm->validation($installment);
        $amount=$this->fm->validation($amount);
        $rno=$this->fm->validation($rno);

        // $installment = 1;
        $query="select * from fee where student_id='$id' ORDER BY id DESC";
        $result4=$this->db->select($query);
        if ($result4) {
            $data=$result4->fetch_assoc();

            $totall = $data['totall_payment'] + $amount;
            // $installment = $data['installment']+1;
        }else{
            $totall = $amount;
        }
        $query = "INSERT INTO fee(student_id,batch_id,installment,amount,date,totall_payment,rno) VALUES('$id','$batch_id','$installment','$amount',now(),'$totall','$rno')";
            $result = $this->db->insert($query);
            if ($result) {
                // if ($type == 'full') {
                //     $query1="UPDATE students SET fee_status='paid' WHERE id='$id'";
                //     $result2=$this->db->update($query1);
                // }
                // if ($type == 'installment') {
                //     $query2="UPDATE students SET fee_status='installment paid' WHERE id='$id'";
                //     $result3=$this->db->update($query2);
                // }
                $query1="UPDATE students SET fee_status='paid' WHERE id='$id'";
                    $result2=$this->db->update($query1);
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }

    public function checkReciept($rno){
        $query="select * from fee where rno='$rno'";
        $result=$this->db->select($query);
        if ($result) {
            return true;
        }
        return false;
    }

    public function addExpense($title,$amount)
    {
        $title=$this->fm->validation($title);
        $amount=$this->fm->validation($amount);

        // $date = date("y-m-d");
        $query = "INSERT INTO expense(title,amount,date) VALUES('$title','$amount',now())";
        $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }

    public function updateExpense($title,$amount,$id)
    {
        $title=$this->fm->validation($title);
        $amount=$this->fm->validation($amount);
        $id=$this->fm->validation($id);

        $query = "UPDATE expense SET title='$title',amount='$amount' WHERE id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "Data Updated";
            return $msg;
        } else {
            $msg = "Data Not Updated";
            return $msg;
        }
    }

    public function deleteExpense($id)
    {
        $id=$this->fm->validation($id);

        $query="delete from expense where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }

    public function addBooking($name,$cnic,$exp_date,$dob,$contact,$testdate,$testtype,$org,$payment,$regdate,$ref,$email)
    {
        $name=$this->fm->validation($name);
        $cnic=$this->fm->validation($cnic);
        $exp_date=$this->fm->validation($exp_date);
        $dob=$this->fm->validation($dob);
        $contact=$this->fm->validation($contact);
        $testdate=$this->fm->validation($testdate);
        $testtype=$this->fm->validation($testtype);
        $org=$this->fm->validation($org);
        $payment=$this->fm->validation($payment);
        $regdate=$this->fm->validation($regdate);
        $ref=$this->fm->validation($ref);
        $email=$this->fm->validation($email);

        $query = "INSERT INTO booking(name,cnic,exp_date,dob,contact,testdate,testtype,org,payment,regdate,ref,email) VALUES('$name','$cnic','$exp_date','$dob','$contact','$testdate','$testtype','$org','$payment','$regdate','$ref','$email')";
        $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }

    public function updateBooking($name,$cnic,$exp_date,$dob,$contact,$testdate,$testtype,$org,$payment,$regdate,$ref,$email,$id)
    {
        $name=$this->fm->validation($name);
        $cnic=$this->fm->validation($cnic);
        $exp_date=$this->fm->validation($exp_date);
        $dob=$this->fm->validation($dob);
        $contact=$this->fm->validation($contact);
        $testdate=$this->fm->validation($testdate);
        $testtype=$this->fm->validation($testtype);
        $org=$this->fm->validation($org);
        $payment=$this->fm->validation($payment);
        $regdate=$this->fm->validation($regdate);
        $ref=$this->fm->validation($ref);
        $email=$this->fm->validation($email);
        $id=$this->fm->validation($id);

        $query = "UPDATE booking SET name='$name',cnic='$cnic',exp_date='$exp_date',dob='$dob',contact='$contact',testdate='$testdate',testtype='$testtype',org='$org',payment='$payment',regdate='$regdate',ref='$ref',email='$email' WHERE id='$id'";
        $result = $this->db->update($query);
        if ($result) {
            $msg = "Data Updated";
            return $msg;
        } else {
            $msg = "Data Not Updated";
            return $msg;
        }
    }

    public function addFeedback($name,$gender,$star,$msg){
        $name=$this->fm->validation($name);
        $gender=$this->fm->validation($gender);
        $star=$this->fm->validation($star);
        $msg=$this->fm->validation($msg);

         $date = date("y-m-d");

        $query = "INSERT INTO feedback(name,gender,date,star,msg) VALUES('$name','$gender','$date','$star','$msg')";
        $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }


    public function uploadCertificateImage($name)
    {
        $name=$this->fm->validation($name);

        $query = "INSERT INTO certificate(image) VALUES('$name')";
        $result = $this->db->insert($query);
        if ($result) {
            $msg = "Image Uploaded";
            return $msg;
        } else {
            $msg = "Image Not Uploaded";
            return $msg;
        }

    }


    public function deleteCertificate($id)
    {
        $id=$this->fm->validation($id);

        $query = "SELECT * FROM certificate WHERE id=$id";
        $result=$this->db->select($query);
        $data=$result->fetch_assoc();
        $image = $data['image'];

        if ($image) {
            unlink('./../images/certificateImages/'.$image);
        

        $query="delete from certificate where id='$id'";
        $result=$this->db->delete($query);
        return $result;
        }
    }

    public function uploadStoryImage($name)
    {
        $name=$this->fm->validation($name);

        $query = "INSERT INTO successStory(image) VALUES('$name')";
        $result = $this->db->insert($query);
        if ($result) {
            $msg = "Image Uploaded";
            return $msg;
        } else {
            $msg = "Image Not Uploaded";
            return $msg;
        }

    }


    public function deleteStory($id)
    {
        $id=$this->fm->validation($id);

        $query = "SELECT * FROM successStory WHERE id=$id";
        $result=$this->db->select($query);
        $data=$result->fetch_assoc();
        $image = $data['image'];

        if ($image) {
            unlink('./../images/storyImage/'.$image);
        

        $query="delete from successStory where id='$id'";
        $result=$this->db->delete($query);
        return $result;
        }
    }

    public function uploadGallaryImage($name)
    {
        $name=$this->fm->validation($name);

        $query = "INSERT INTO gallary(image) VALUES('$name')";
        $result = $this->db->insert($query);
        if ($result) {
            $msg = "Image Uploaded";
            return $msg;
        } else {
            $msg = "Image Not Uploaded";
            return $msg;
        }

    }


    public function deleteGallary($id)
    {
        $id=$this->fm->validation($id);

        $query = "SELECT * FROM gallary WHERE id=$id";
        $result=$this->db->select($query);
        $data=$result->fetch_assoc();
        $image = $data['image'];

        if ($image) {
            unlink('./../images/gallaryImage/'.$image);
        

        $query="delete from gallary where id='$id'";
        $result=$this->db->delete($query);
        return $result;
        }
    }


}


?>