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

	public function addBadge($badge)
    {

        $query="INSERT INTO student_badge(badge) VALUES('$badge')";
        $result=$this->db->insert($query);
        if ($result) {
            $msg = "Data Inserted";
            return $msg;
        } else {
            $msg = "Data Not Inserted";
            return $msg;
        }

    }

    public function updateBadge($badge,$id)
    {
        $query = "update student_badge set badge='$badge' where id='$id'";
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
        $query="delete from $table where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }


    public function deleteStudent($id)
    {
        $query="delete from students where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }
    public function terminateStudent($id){
        $query="UPDATE students SET status='0' WHERE id='$id'";
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
    public function updateFeeStatus($id){

        // $d=strtotime("-1 Month");
        $date = date("y-m-d");
        $query1="select * from fee where student_id='$id' and date='$date'";
        $result1=$this->db->select($query1);
        if ($result1) {
            $query="UPDATE students SET fee_status='unpaid' WHERE id='$id'";
            $result2=$this->db->update($query);
        }
        
    }

    public function getAllRecordofFees(){

        $d=strtotime("-1 Month");
        $date = date("y-m-d", $d);
        $query="select * from students where start_date='$date'";
        $result=$this->db->select($query);
        return $result;
    }

    public function refundFee($id,$amount){
        $query="select * from fee where student_id='$id' ORDER BY id DESC";
        $result=$this->db->select($query);
        if ($result) {
            $data=$result->fetch_assoc();

            $fee_id = $data['id'];
            $fee_amount = $data['amount'];
            if ($fee_amount>0) {
                if ($amount ==$fee_amount) {
                    $query1="UPDATE fee SET amount='0' WHERE id='$fee_id'";
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
                    $amount = $fee_amount - $amount;
                    $query1="UPDATE fee SET amount='$amount' WHERE id='$fee_id'";
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
    

    public function addBatch($name,$start_date){

        $query = "INSERT INTO batch(batch_name,batch_start) VALUES('$name','$start_date')";
            $result = $this->db->insert($query);
            if ($result) {
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }
    public function updatebatch($name,$batch_start,$id){
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

    public function deleteBatch($id)
    {
        $query="delete from batch where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }

    public function selectBatch($batch_id,$Paymenttype){
        $query="select * from students where batch_id='$batch_id' and fee_status='$Paymenttype'";
        $result=$this->db->select($query);
        return $result;
    }

    public function payFee($id,$batch_id,$type,$amount,$rno){
        $query="select * from fee where student_id='$id' ORDER BY id DESC";
        $result4=$this->db->select($query);
        if ($result4) {
            $data=$result4->fetch_assoc();

            $totall = $data['totall_payment'] + $amount;
        }else{
            $totall = $amount;
        }
        $query = "INSERT INTO fee(student_id,batch_id,payment_type,amount,date,totall_payment,rno) VALUES('$id','$batch_id','$type','$amount',now(),'$totall','$rno')";
            $result = $this->db->insert($query);
            if ($result) {
                if ($type == 'full') {
                    $query1="UPDATE students SET fee_status='paid' WHERE id='$id'";
                    $result2=$this->db->update($query1);
                }
                if ($type == 'installment') {
                    $query2="UPDATE students SET fee_status='installment paid' WHERE id='$id'";
                    $result3=$this->db->update($query2);
                }
                $msg = "Data Inserted";
                return $msg;
            } else {
                $msg = "Data Not Inserted";
                return $msg;
            }
    }

    public function addExpense($title,$amount){
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

    public function updateExpense($title,$amount,$id){
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
        $query="delete from expense where id='$id'";
        $result=$this->db->delete($query);
        return $result;
    }

    public function addBooking($name,$cnic,$exp_date,$dob,$contact,$testdate,$testtype,$org,$payment,$regdate,$ref,$email){

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

}


?>