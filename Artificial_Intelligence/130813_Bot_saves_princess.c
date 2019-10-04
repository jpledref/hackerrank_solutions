#include <stdio.h>
#include <string.h>
#include <math.h>
/* Head ends here */
void displayPathtoPrincess(int n, char grid[n][n]){
    //logic here
    int j;
	char s1[]="UP";
	char s2[]="DOWN";
	char s3[]="RIGHT";
	char s4[]="LEFT";
    char *a=NULL;
    a=malloc(n*sizeof(char*));
	//printf(s1);
    //for($j = 0; $j <= $m-1; $j++){
    for (j = 0; j <= n-1; j++){
        //a=grid[j];
        strcpy(a, grid[j]);
        printf(a);
    }
    
	
}
/* Tail starts here */
int main(void) {

    int m;
    scanf("%d", &m);
    char grid[m][m];
    char line[m];

    for(int i=0; i<m; i++) {
        scanf("%s", line);
        strncpy(grid[i], line, m);
    }
    displayPathtoPrincess(m,grid);
    return 0;
}
