<?php
class Node{
    public $left,$right;
    public $data;
    function __construct($data)
    {
        $this->left=$this->right=null;
        $this->data = $data;
    }
}
class Solution{
    public function insert($root,$data){
        if($root==null){
            return new Node($data);
        }
        else{
            if($data<=$root->data){
                $cur=$this->insert($root->left,$data);
                $root->left=$cur;
            }
            else{
                $cur=$this->insert($root->right,$data);
                $root->right=$cur;
            }
            return $root;
        }
    }

    public function getHeight($root){
        //Write your code here
        $left = 0;
        $right = 0;
        $height = 0;

        if ($root->left != null) {
            $left = $this->getHeight($root->left) + 1;
        }
        if ($root->right != null) {
            $right = $this->getHeight($root->right) + 1;
        }

        if ($left > $right) {
            $height = $left;
        } else {
            $height = $right;
        }

        return $height;

    }

}//End of Solution
$myTree=new Solution();
$root=null;
$T=intval(fgets(STDIN));
while($T-->0){
    $data=intval(fgets(STDIN));
    $root=$myTree->insert($root,$data);
}
$height=$myTree->getHeight($root);
echo $height;
?>
