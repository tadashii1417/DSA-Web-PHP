#include "header.h"
#include <fstream>
using namespace std;

int main(int argc, char** argv)
{
	_swap(1,2);
	if (argc > 2) {
		ifstream fin(argv[1]);
		fin.close();
		ofstream fout(argv[2]);
		fout << "Write something";
		fout.close();

	}
}